<?php

namespace App\Http\Controllers\Lte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Ltecategory;
use App\News;

class NewsController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('adminlte.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['categories'] = Ltecategory::all();
        return view('adminlte.news.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,News $news)
    {
        if($request->image->getClientOriginalName())
        {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->move('uploads/newsimage/', $file);
        }
        else
        {
            $file = '';
        }
        $news->category_id = $request->category_id;
        $news->image = $file;
        $news->title = $request->title;
        $news->author = $request->author;
        $news->description = $request->description;
     
        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $data['news'] = $news;
        //dd($data);
        $data['categories'] = Ltecategory::all();
        return view('adminlte.news.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        if(isset($request->image) && $request->image->getClientOriginalName())
        {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->move('uploads/newsimage/', $file);
        }
        else
        {
            if(!$news->image)
                $file = '';
            else
                $file = $news->image;
        }
        $news->category_id = $request->category_id;
        $news->image = $file;
        $news->title = $request->title;
        $news->author = $request->author;
        $news->description = $request->description;
     
        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('admin.news.index');
    }
}
