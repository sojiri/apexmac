@extends('layouts.adminlte')    
    
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Categories</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <div class="row">
                    <label for="title" class="col-md-3">Title</label>
                    <div class="col-md-6">
                        <input type="text" name="title" value="{{ $category->title }}" class="form-control">
                    </div>
                    <div class="clear-fix">
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