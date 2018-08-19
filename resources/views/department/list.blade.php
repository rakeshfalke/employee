@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Employee List</div>
                <div class="card-body">
                <table class="table table-striped">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Name</th>
<th scope="col">Operations</th>
</tr>
</thead>
<tbody>
@foreach ($departments as $dept)
<tr>
<th scope="row">{{ $dept->id }}</th>
<td>{{ $dept->name }}</td>
<td>
  <a href="{{ route('department.show', $dept->id) }}" class="btn btn-info">View</a>
  <a href="{{ route('department.edit', $dept->id) }}" class="btn btn-primary">Edit</a>
</td>
</tr>
@endforeach
</tbody>
</table>
{{ $departments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
