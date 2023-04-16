<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Kefo extends Model
{
    use HasFactory;

    protected $table = 'kefo';
    protected $guarded = ['id'];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopeFilter($query)
    {
        if (request('keyword')) {
            return $query->where('judul', 'like', '%' . request('keyword') . '%')
                ->orWhere('desc_kefo', 'like', '%' . request('keyword') . '%');
        }
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
