<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($goods)
        {
            $goods->id = md5(microtime());
        });
    }
}
