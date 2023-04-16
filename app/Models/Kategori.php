<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kategori extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'kategori';
    protected $guarded = ['id'];

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'kategori_id');
    }

    public function kefo()
    {
        return $this->hasMany(Kefo::class, 'kategori_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
