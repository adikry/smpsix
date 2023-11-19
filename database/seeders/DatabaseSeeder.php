<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Guru;
use App\Models\Kategori;
use App\Models\Kefo;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Guru::truncate();
        // User::factory(2)->create();

        // Kategori::create([
        //     'nama' => 'Lillah (Liputan Sekolah)',
        //     'slug' => 'lillah'
        // ]);
        // Kategori::create([
        //     'nama' => 'Tasiwa (Perstasi Siswa)',
        //     'slug' => 'tasiwa'
        // ]);
        // Kategori::create([
        //     'nama' => 'Kefo (Kegiatan, Foto & Vidio)',
        //     'slug' => 'kefo'
        // ]);
        // Kategori::create([
        //     'nama' => 'Cerdik (Cerita Mendidik)',
        //     'slug' => 'cerdik'
        // ]);
        // Kategori::create([
        //     'nama' => 'Walis (Siswa Menulis)',
        //     'slug' => 'walis'
        // ]);
        // Kategori::create([
        //     'nama' => 'Gulis (Guru Menulis)',
        //     'slug' => 'gulis'
        // ]);

        // Artikel::factory(25)->create();
        Guru::factory(16)->create();
        // User::create([
        //     'nama' => 'Mohamad Dikry',
        //     'username' => 'Masiya',
        //     'email' => 'adik@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        // Guru::factory(18)->create();

        Staff::factory(10)->create();
    }
}
