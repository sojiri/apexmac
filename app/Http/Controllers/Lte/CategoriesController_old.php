<?php

namespace App\Http\Controllers\Lte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ltecategory;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Ltecategory::all();
        return view('adminlte.categories.index', compact('categories'));
    }
}
