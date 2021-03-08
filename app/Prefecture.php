<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable = [
        'mountain_id',
        'prefecture_name',
    ];
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function mountain()
    {
        return $this->belongsTo(Mountain::class);
    }
}
