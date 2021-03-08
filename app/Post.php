<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'article',
        'climbing_time',
        'downhill_time',
        'alert_flag',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
