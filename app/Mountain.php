<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Mountain extends Model
{
    protected $fillable = [
        'id',
        'mountain_name',
        'elevation',
    ];


    public function prefectire()
    {
        return $this->hasOne(Prefecture::class);
    }

    public function post()
    {
        return $this->hasMeny(Post::class);
    }

    // ------------------------------------------------------

    // ------------------------------------------------------
}
