<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mountains extends Model
{
    protected $fillable = [
        'mountain_name',
        'elevation',
    ];
    public function prefectire()
    {
        return $this->hasOne(Prefecture::class);
    }
}
