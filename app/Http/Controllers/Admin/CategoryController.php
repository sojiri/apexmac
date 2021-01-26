<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Category;
use File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.collection.category.index')->with('category', $category);
    }

    public function create()
    {
        $groups = Group::get(); //3=Deleted Data
        return view('admin.collection.category.create')->with('groups', $groups);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        //$category->image = $request->input('category_img');
        if($request->hasFile('category_img'))
        {
            $file = $request->file('category_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/categoryimage/', $filename);
            $category->image = $filename;
        }
        //$category->icon = $request->input('category_icon');
        if($request->hasFile('category_icon'))
        {
            $file = $request->file('category_icon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/categoryicon/', $filename);
            $category->icon = $filename;
        }
        $category->status = $request->input('status') == true ? '1' : '0'; //0=show  1=hide
        $category->save();
        return redirect()->back()->with('status', 'Category Added Successfully');
    }

    public function edit($id)
    {
        $groups = Group::all();
        $category = Category::find($id);
        return view('admin.collection.category.edit')->with('groups', $groups)->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        //$category->image = $request->input('category_img');
        if($request->hasFile('category_img'))
        {
            $filepath = 'uploads/categoryimage/'.$category->image;
            if(File::exists($filepath))
            {
                File::delete($filepath);
            }
            $file = $request->file('category_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/categoryimage/', $filename);
            $category->image = $filename;
        }
        //$category->icon = $request->input('category_icon');
        if($request->hasFile('category_icon'))
        {
            $filepath = 'uploads/categoryicon/'.$category->icon;
            if(File::exists($filepath))
            {
                File::delete($filepath);
            }
            $file = $request->file('category_icon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/categoryicon/', $filename);
            $category->icon = $filename;
        }
        $category->status = $request->input('status') == true ? '1' : '0'; //0=show  1=hide
        $category->update();
        return redirect()->back()->with('status', 'Category Updated Successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->status = '3';
        $category->update();
        return redirect()->back()->with('status', 'Category Deleted Successfully');
    }
}
