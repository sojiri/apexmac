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
          <span>Products</span>
          <a href="#" class="badge bg-primary p-2 text-white float-right">Deleted Records</a>
          <a href="{{ route('add-products') }}" class="badge bg-primary p-2 text-white float-right">Add Product</a>
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
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Group Name</th>
                            <th>Image</th>
                            <th>Icon</th>
                            <th>Show/Hide</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <!-- @foreach ($category as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->group->name }}</td>
                                <td>
                                  <img src="{{ asset('uploads/categoryimage/' .$item->image) }}" width="50px">
                                </td>
                                <td>
                                  <img src="{{ asset('uploads/categoryicon/' .$item->icon) }}" width="50px">
                                </td>
                                <td>
                                    <input type="checkbox" {{ $item->status == '1' ? 'checked' : ' '}}>
                                </td>
                                <td>
                                    <a href="{{ route('category-edit', $item->id) }}" class="badge btn-primary">Edit</a>
                                    <a href="{{ route('category-delete', $item->id) }}" class="badge btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection