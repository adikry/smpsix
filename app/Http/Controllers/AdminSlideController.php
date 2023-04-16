<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slide.index', [
            'dataSlide' => Slide::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
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
            'imageSlide' => 'image|file|max:2048',
            'alt' => 'required|max:100',
            'urutan' => 'required|unique:slides'
        ]);

        if ($request->file('imageSlide')) {
            $validatedData['imageSlide'] = $request->file('imageSlide')->store('hero-image');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Slide::create($validatedData);
        return redirect('/admin/slide')->with('success', 'Data Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('admin.slide.edit', [
            'slide' => $slide
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $rules = ([
            'imageSlide' => 'image|file|max:2048',
            'alt' => 'required|max:100',
        ]);

        if ($request->urutan != $slide->urutan) {
            $rules['urutan'] = 'required|unique:slides';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('imageSlide')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['imageSlide'] = $request->file('imageSlide')->store('hero-image');
        }

        $validatedData['user_id'] = auth()->user()->id;
        Slide::where('id', $slide->id)
            ->update($validatedData);

        return redirect('/admin/slide')->with('success', 'Data Slide Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        if ($slide->imageSlide) {
            Storage::delete($slide->imageSlide);
        }
        Slide::destroy($slide->id);
        return redirect('/admin/slide')->with('success', 'Data Berhasil di Hapus');
    }
}
