<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Artikel extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'artikel';
    protected $guarded = ['id'];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $with = ['publisher', 'kategori'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['keyword'] ?? false, function ($query, $keyword) {
            return $query->where(function ($query) use ($keyword) {
                $query->where('judul', 'like', '%' . $keyword . '%')
                    ->orWhere('body', 'like', '%' . $keyword . '%');
            });
        });

        $query->when($filters['rubrik'] ?? false, function ($query, $rubrik) {
            return $query->whereHas('kategori', function ($query) use ($rubrik) {
                $query->where('slug', $rubrik);
            });
        });

    }

    public function publisher()
    {
        // laravel akan melihat di tabel posts foreignKey author -> karena tidak ada maka beritahu bahwa ini adalah alias dari user_id
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
