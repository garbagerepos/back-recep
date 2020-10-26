<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $guarded = ['id'];

   /* public function getImageUrlAttribute($value)
    {
        return "http://localhost/api/l/".$value;
    }*/
}
