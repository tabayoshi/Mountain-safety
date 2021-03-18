<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'address',
        'tel'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDtata()
    {
        return $this->id . ':' . $this->name; //データの内容をテキストで返す
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
