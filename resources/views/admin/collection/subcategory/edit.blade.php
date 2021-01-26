@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="#" target="_blank">Collections</a>
          <span>/</span>
          <span>Edit Subcategory</span>
          <a href="{{ route('sub-category') }}" class="badge bg-primary p-2 text-white float-right">Back</a>
        </h4>
      </div>
    </div>
    <!-- Heading -->


    <div class="row mt-3">
        <div class="col-md-12">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
            @endif
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('subcategory-update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category ID</label>
                                    <select name="category_id" class="form-control">
                                        <option value="{{ $subcategory->category_id }}">{{ $subcategory->category->name }}</option>
                                        @foreach ($category as $gitem)
                                            <option value="{{ $gitem->id }}">{{ $gitem->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $subcategory->name }}" class="form-control" placeholder="Enter Name">
                                </div>
                            </div>
        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea rows="4" name="description" class="form-control" placeholder="Enter Description">{{ $subcategory->description }}</textarea>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{ asset('uploads/subcategory/' .$subcategory->image) }}" width="100px">
                                </div>
                            </div>
        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Priority</label>
                                    <input type="number" name="priority" value="{{ $subcategory->priority }}" class="" placeholder="Enter Priority">
                                </div>
                            </div>
        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Show / Hide</label>
                                    <input type="checkbox" name="status" class="" {{ $subcategory->status == '1' ? 'checked' : '' }} placeholder="Enter Name">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection