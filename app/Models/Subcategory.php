<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    protected $table = 'subcategorys';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
