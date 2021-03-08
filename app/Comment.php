<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
    ];
    public function comments()
    {
        return $this->belongsTo(User::class);
        return $this->belongsTo(Post::class);
    }
}
