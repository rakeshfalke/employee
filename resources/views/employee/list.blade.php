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
<th scope="col">First</th>
<th scope="col">Last</th>
<th scope="col">Handle</th>
<th scope="col">Operations</th>

</tr>
</thead>
<tbody>
@foreach ($employees as $employee)
<tr>
<th scope="row">{{ $employee->id }}</th>
<td>{{ $employee->first_name }}</td>
<td>{{ $employee->last_name }}</td>
<td>{{ $employee->pan }}</td>
<td>
  <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-info">View</a>
  <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
</td>
</tr>
@endforeach
</tbody>
</table>
{{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
