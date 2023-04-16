<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        return view('admin.kategori.index', [
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:kategori'
        ]);

        Kategori::create($validatedData);
        return redirect('/admin/kategori')->with('success', 'Data Kategori Rubrik Baru telah di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $this->authorize('admin');
        return view('admin.kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->authorize('admin');
        $rules = ([
            'nama' => 'required|max:255',
        ]);

        if ($request->slug != $kategori->slug) {
            $rules['slug'] = 'required|unique:kategori';
        }

        $validatedData = $request->validate($rules);

        Kategori::where('id', $kategori->id)
            ->update($validatedData);

        return redirect('/admin/kategori')->with('success', 'Berhasil edit Data Kategori ' . $kategori->nama);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $this->authorize('admin');
        Kategori::destroy($kategori->id);
        return redirect('/admin/kategori')->with('success', 'Data Kategori : ' . $kategori->nama . ' Berhasil di Hapus');
    }

    public function list()
    {
        return view('admin.kategori.list', [
            'listKategori' => Kategori::all()
        ]);
    }

    public function slugKategori(Request $request)
    {
        $this->authorize('admin');
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
