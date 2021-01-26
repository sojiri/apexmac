@extends('layouts.admin')

@section('content')

<!-- Modal -->
<div class="modal fade" id="SubCategoryMODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subcategory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{ route('subcategory-store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
        

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Category ID</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($category as $gitem)
                                    <option value="{{ $gitem->id }}">{{ $gitem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea rows="4" name="description" class="form-control" placeholder="Enter Description"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Priority</label>
                            <input type="number" name="priority" class="" placeholder="Enter Priority">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Show / Hide</label>
                            <input type="checkbox" name="status" class="" placeholder="Enter Name">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

        </form> 

      </div>
    </div>
</div>

<div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="#" target="_blank">Collections</a>
          <span>/</span>
          <span>Subcategory</span>
          <a href="{{ route('group-deleted-records') }}" class="badge bg-primary p-2 text-white float-right">Deleted Records</a>
          <a href="" data-toggle="modal" data-target="#SubCategoryMODAL" class="badge bg-primary p-2 text-white float-right">Add Subcategory</a>
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
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Priority</th>
                            <th>Image</th>
                            <th>Show/Hide</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach ($subcategory as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->priority }}</td>
                                <td>
                                  <img src="{{ asset('uploads/subcategory/' .$item->image) }}" width="50px">
                                </td>
                                <td>
                                    <input type="checkbox" {{ $item->status == '1' ? 'checked' : ' '}}>
                                </td>
                                <td>
                                    <a href="{{ route('subcategory-edit', $item->id) }}" class="badge btn-primary">Edit</a>
                                    <a href="{{ route('subcategory-delete', $item->id) }}" class="badge btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection