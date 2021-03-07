<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable = [
        'mountain_id',
        'prefecture_name',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
