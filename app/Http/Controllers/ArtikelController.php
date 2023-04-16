<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Kefo;
use App\Models\User;

class ArtikelController extends Controller
{
    public function index()
    {
        $title = '';

        if (request('rubrik')) {
            $kategori = Kategori::firstWhere('slug', request('rubrik'));
            $title = ' Rubrik : ' . $kategori->nama;
        }
        // if (request('penulis')) {
        //     $penulis = Artikel::firstWhere('penulis', request('penulis'));
        //     $title = ' Penulis : ' . $penulis->penulis;
        // }

        return view('artikel.index', [
            'title' => $title,
            'posts' =>  Artikel::latest()->filter(request(['keyword', 'rubrik']))->whereNotNull('published_at')->paginate(9)->withQueryString(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function show(Artikel $artikel)
    {
        return view('artikel.show', [
            'artikel' => $artikel,
            'latests' => Artikel::whereNotNull('published_at')->latest()->limit(3)->get(),
            'kategori' => Kategori::all()
        ]);
    }
}
