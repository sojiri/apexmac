<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ltecategory extends Model
{
    protected $guarded = [];

    public function news()
    {
        return $this->hasMany('App\News');
    }
}
