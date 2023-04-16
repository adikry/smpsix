<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Kefo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKefoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin) {
            $kefo = Kefo::orderBy('id', 'desc')->get();
        } else {
            $kefo = Kefo::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        }

        return view('admin.kefo.index', [
            'kefo' => $kefo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kefo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:kefo',
            'kategori_id' =>  'required',
            'imageUtama' => 'image|file|max:1024',
            'desc_kefo' => 'required|max:255',
            'penulis' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        if ($request->file('imageUtama')) {
            $validatedData['imageUtama'] = $request->file('imageUtama')->store('kefo-parents');
        }

        if ($request->file('image')) {
            $countImage = count($request->file('image'));
        } else {
            $countImage = 0;
        }

        $dataKefo = Kefo::create($validatedData);


        for ($i = 0; $countImage > $i; $i++) {
            $dataImage = [
                'kefo_id' => $dataKefo->id,
                'desc' => $request->desc[$i],
                'file_image' => $request->file('image')[$i]->store('kefo-child')
            ];
            Image::create($dataImage);
        }

        return redirect('/admin/kefo')->with('success', 'Data Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kefo  $kefo
     * @return \Illuminate\Http\Response
     */
    public function show(Kefo $kefo)
    {
        return view('admin.kefo.show', [
            'kefo' => $kefo,
            'images' => Image::where('kefo_id', $kefo->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kefo  $kefo
     * @return \Illuminate\Http\Response
     */
    public function edit(Kefo $kefo)
    {
        return view('admin.kefo.edit', [
            'kefo' => $kefo,
            'images' => Image::where('kefo_id', $kefo->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kefo  $kefo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kefo $kefo)
    {

        $imageData = ([
            'oldImage' => $request->oldImage,
            'idImage' => $request->idImage
        ]);

        if ($request->oldImage) {
            $countImage = count($imageData['oldImage']);
        } else {
            $countImage = 0;
        }

        if ($imageData['oldImage']) {
            if ($request->file('image') && $request->desc) {
                Image::where('kefo_id', $kefo->id)
                    ->delete();
                for ($i = 0; $countImage > $i; $i++) {
                    Storage::delete($imageData['oldImage'][$i]);
                }

                for ($i = 0; count($request->file('image')) > $i; $i++) {
                    $dataImage = [
                        // 'file_image' => $request->file('image')[$i],
                        'desc' => $request->desc[$i],
                        'kefo_id' => $kefo->id,
                        'file_image' => $request->file('image')[$i]->store('kefo-child')
                        // 'idImage' => $imageData['idImage'][$i]
                    ];
                    Image::create($dataImage);
                }
            }
        } else {
            if ($request->file('image') && $request->desc) {
                for ($i = 0; count($request->file('image')) > $i; $i++) {
                    $dataImage = [
                        // 'file_image' => $request->file('image')[$i],
                        'desc' => $request->desc[$i],
                        'kefo_id' => $kefo->id,
                        'file_image' => $request->file('image')[$i]->store('kefo-child')
                        // 'idImage' => $imageData['idImage'][$i]
                    ];
                    Image::create($dataImage);
                }
            }
        }

        $rules = ([
            'judul' => 'required|max:255',
            'desc_kefo' => 'required|max:255'
        ]);

        if ($request->slug != $kefo->slug) {
            $rules['slug'] = 'required|unique:kefo';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('imageUtama')) {

            if ($request->oldUtama) {
                Storage::delete($request->oldUtama);
            }

            $validatedData['imageUtama'] = $request->file('imageUtama')->store('kefo-parents');
        }

        Kefo::where('id', $kefo->id)
            ->update($validatedData);

        return redirect('/admin/kefo')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kefo  $kefo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kefo $kefo)
    {
        $dataImage = ([
            'images' => Image::where('kefo_id', $kefo->id)->get()
        ]);

        foreach ($dataImage['images'] as $image) {
            Storage::delete($image->file_image);
        }
        Image::where('kefo_id', $kefo->id)
            ->delete();
        if ($kefo->imageUtama) {
            Storage::delete($kefo->imageUtama);
        }

        Kefo::destroy($kefo->id);

        return redirect('/admin/kefo')->with('success', 'Data berhasil di Hapus');
    }

    public function publish(Request $request)
    {
        $published_at = ([
            'published_at' => now(),
            'published_by' => auth()->user()->nama
        ]);

        Kefo::where('slug', $request->slug)
            ->update($published_at);

        return redirect('/admin/kefo')->with('success', 'Artikel Kefo Berhasil di Publish!');
    }
}
