<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];

//    public function setIdAttribute()
//    {
//        $this->attributes['id'] = md5(microtime());
//    }
}
