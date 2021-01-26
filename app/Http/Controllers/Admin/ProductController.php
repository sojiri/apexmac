<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.collection.product.index')->with('category', $category);
    }

    public function create()
    {
        $subcategory = Subcategory::all();
        return view('admin.collection.product.create')
            ->with('subcategory', $subcategory);
    }
}
