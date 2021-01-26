<?php

namespace App\Http\Controllers\Lte;

use App\Ltecategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Ltecategory::all();
        return view('adminlte.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ltecategory $ltecategory)
    {
        $ltecategory->title = $request->title;
        $ltecategory->save();
        
        //Alternate method.  Remove class and typehint Ltecategory from parameters above
        // $data = [ 'title' => $request->title];
        // Ltecategory::create($data);
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ltecategory  $ltecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Ltecategory $ltecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ltecategory  $ltecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Ltecategory $category)
    {
        return view('adminlte.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ltecategory  $ltecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ltecategory $category)
    {
        $category->title = $request->title;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ltecategory  $ltecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ltecategory $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
