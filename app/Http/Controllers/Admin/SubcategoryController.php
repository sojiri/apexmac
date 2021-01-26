<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use File;

class SubcategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $subcategory = Subcategory::where('status', '!=', '3')->get(); //3 - Deleted
        return view('admin.collection.subcategory.index')
            ->with('subcategory', $subcategory)
            ->with('category', $category);
    }

    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->input('category_id');
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        $subcategory->priority = $request->input('priority');
        $subcategory->status = $request->input('status') == true ? '1' : '0'; //0=show  1=hide

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/subcategory/', $filename);
            $subcategory->image = $filename;
        }

        $subcategory->save();

        return redirect()->back()->with('status', 'Subcategory Saved Successfully.');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::all();
        $subcategory = Subcategory::find($id);
        return view('admin.collection.subcategory.edit')
            ->with('subcategory', $subcategory)
            ->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        $subcategory->priority = $request->input('priority');
        $subcategory->status = $request->input('status') == true ? '1' : '0'; //0=show  1=hide

        if($request->hasFile('image'))
        {
            $filepath = 'uploads/subcategory/'.$subcategory->image;
            if(File::exists($filepath))
            {
                File::delete($filepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/subcategory/', $filename);
            $subcategory->image = $filename;
        }

        $subcategory->save();

        return redirect('sub-category')->with('status', 'Subcategory Updated Successfully.');
    }
    
    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->status = '3';
        $subcategory->update();
        return redirect()->back()->with('status', 'Subcategory Deleted Successfully');
    }
}
