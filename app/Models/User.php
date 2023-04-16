<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }

    public function kefo()
    {
        return $this->hasMany(Kefo::class);
    }

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function slide()
    {
        return $this->hasMany(Slide::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }


    public function getRouteKeyName()
    {
        return 'username';
    }
}
