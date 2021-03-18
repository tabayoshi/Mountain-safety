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
        'mountain_id',
        'user_id'
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function mountain()
    {
        return $this->belongsTo(Mountain::class);
    }
}
