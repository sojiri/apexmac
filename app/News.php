<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function ltecategory()
    {
        return $this->belongsTo('App\Ltecategory', 'category_id');
    }
}
