<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (auth()->user()->is_admin) {
        //     $artikel = Artikel::whereNotIn('kategori_id', [3])->orderBy('id', 'desc')->get();
        // } else {
        //     $artikel = Artikel::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        // }

        $artikel = Artikel::whereNotIn('kategori_id', [3])->orderBy('id', 'desc')->get();
        return view('admin.artikel.index', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artikel.create', [
            'kategori' => Kategori::whereNotIn('id', [3])->get()
        ]);
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
            'slug' => 'required|unique:artikel',
            'kategori_id' => 'required',
            'body' => 'required',
            'penulis' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')[0]->store('linagar-images');
            if (isset($request->file('image')[1])) {
                $validatedData['optional1'] = $request->file('image')[1]->store('linagar-images');
            }
            if (isset($request->file('image')[2])) {
                $validatedData['optional2'] = $request->file('image')[2]->store('linagar-images');
            }
        }
        $validatedData['user_id'] = auth()->user()->id;

        // return ddd($validatedData);

        Artikel::create($validatedData);
        return redirect('/admin/linagar')->with('success', 'Data baru Linagar sukses ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $linagar)
    {
        return view('admin.artikel.show', [
            'artikel' => $linagar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $linagar)
    {
        return view('admin.artikel.edit', [
            'artikel' => $linagar,
            'kategori' => Kategori::whereNotIn('id', [3])->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $linagar)
    {
        $rules = ([
            'judul' => 'required|max:255',
            'kategori_id' => 'required',
            'body' => 'required',
            'penulis' => 'required',
        ]);

        if ($request['slug'] != $linagar->slug) {
            $rules['slug'] = 'required|unique:artikel';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if (isset($request->file('image')[0])) {
                $validatedData['image'] = $request->file('image')[0]->store('linagar-images');
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
            }
            if (isset($request->file('image')[1])) {
                $validatedData['optional1'] = $request->file('image')[1]->store('linagar-images');
                if ($request->oldOptional1) {
                    Storage::delete($request->oldOptional1);
                }
            }
            if (isset($request->file('image')[2])) {
                $validatedData['optional2'] = $request->file('image')[2]->store('linagar-images');
                if ($request->oldOptional2) {
                    Storage::delete($request->oldOptional2);
                }
            }
        }

        // return ddd($validatedData);

        Artikel::where('id', $linagar->id)
            ->update($validatedData);

        return redirect('/admin/linagar')->with('success', 'Data Linagar sukses di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $linagar)
    {
        if ($linagar->image) {
            Storage::delete($linagar->image);
        }
        if ($linagar->optional1) {
            Storage::delete($linagar->optional1);
        }
        if ($linagar->optional2) {
            Storage::delete($linagar->optional2);
        }
        Artikel::destroy($linagar->id);
        return redirect('/admin/linagar')->with('success', 'Data Berhasil di Hapus!');
    }

    public function publish(Request $request)
    {
        $published_at = ([
            'published_at' => now(),
            'published_by' => auth()->user()->nama
        ]);

        Artikel::where('slug', $request->slug)
            ->update($published_at);

        return redirect('/admin/linagar')->with('success', 'Artikel Berhasil di Publish!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Artikel::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
