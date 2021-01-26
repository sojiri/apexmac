@extends('layouts.adminlte')    
    
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit News</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit News</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <div class="row">
                    <label for="title" class="col-md-3">Title</label>
                    <div class="col-md-6">
                        <input type="text" name="title" value="{{ $news->title }}" class="form-control">
                    </div>
                    <div class="clear-fix">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label for="author" class="col-md-3">Category</label>
                    <div class="col-md-6">
                        <select name="category_id" class="form-control">
                            <option value="">Choose Category</option>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}"
                                    
                                    @if($c->id == $news->category_id)
                                    selected
                                    @endif
                                    
                                >{{ $c->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="clear-fix">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label for="description" class="col-md-3">Description</label>
                    <div class="col-md-6">
                        <textarea name="description" class="form-control" cols="30" rows="10">{{ $news->description }}</textarea>       
                    </div>
                    <div class="clear-fix">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label for="author" class="col-md-3">Author</label>
                    <div class="col-md-6">
                        <input type="text" name="author" value="{{ $news->author }}" class="form-control">
                    </div>
                    <div class="clear-fix">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label for="image" class="col-md-3">Image</label>
                    <div class="col-md-6">
                        <input type="file" name="image">
                    </div>
                    <div class="clear-fix">
                        @if($news->image)
                            <div>
                                <img src="{{ asset('uploads/newsimage/' .$news->image) }}" width="150px">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </form>
    </div>
</section>
@endsection