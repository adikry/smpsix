<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Kategori;
use App\Models\Kefo;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class KefoController extends Controller
{
    public function index()
    {
        return view('artikel.kefo', [
            'kefoLast' => Kefo::whereNotNull('published_at')->latest('published_at')->limit(4)->get(),
            'posts' => Kefo::whereNotNull('published_at')->latest('published_at')->filter('keyword')->paginate(9)
        ]);
    }

    public function show(Kefo $kefo)
    {
        return view('artikel.showKefo', [
            'kefo' => $kefo,
            'latests' => Kefo::whereNotNull('published_at')->latest()->limit(3)->get(),
            'kategori' => Kategori::all(),
            'images' => Image::where('kefo_id', $kefo->id)->get()
        ]);
    }
}
