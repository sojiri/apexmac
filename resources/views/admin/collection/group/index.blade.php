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
          <span>Group</span>
          <a href="{{ route('group-deleted-records') }}" class="badge bg-primary p-2 text-white float-right">Deleted Records</a>
          <a href="{{ route('group-add') }}" class="badge bg-primary p-2 text-white float-right">Add Group</a>
        </h4>
      </div>
    </div>
    <!-- Heading -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Show/Hide</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($group as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->descrip }}</td>
                                <td>
                                    <input type="checkbox" {{ $item->status == '1' ? 'checked' : ' '}}>
                                </td>
                                <td>
                                    <a href="{{ route('group-edit', $item->id) }}" class="badge btn-primary">Edit</a>
                                    <a href="{{ route('group-delete', $item->id) }}" class="badge btn-danger">Delete</a>
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