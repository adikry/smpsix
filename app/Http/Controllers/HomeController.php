<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Slide;
use App\Models\Staff;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.index', [
            'artikels' => Artikel::whereNotNull('published_at')->latest()->limit(6)->get(),
            'heros' => Slide::orderBy('urutan', 'asc')->get(),
            'guru' => Guru::all()->count(),
            'staff' => Staff::all()->count(),
            'siswa' => Siswa::first(),
        ]);
    }

    public function about()
    {
        return view('home.about');
    }

    public function sejarah()
    {
        return view('home.sejarah');
    }

    public function visiMisi()
    {
        return view('home.visi-misi');
    }

    public function guru()
    {
        return view('home.guru', [
            'dataGuru' => Guru::orderBy('status', 'asc')->orderBy('nama', 'asc')->paginate(12)
        ]);
    }

    public function struktur()
    {
        return view('home.struktur');
    }

    public function staff()
    {
        return view('home.staff', [
            'dataStaff' => Staff::orderBy('nama', 'asc')->paginate(8)
        ]);
    }

    public function kontak()
    {
        return view('home.kontak');
    }
}
