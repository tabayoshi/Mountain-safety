<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Prefecture extends Model
{
    protected $fillable = [
        'mountain_id',
        'prefecture_name',
    ];
    public function mountain()
    {
        return $this->belongsTo(Mountain::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
