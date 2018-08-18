@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Details</div>
                <div class="card-body">
                  <div class="row">
                  <table class="table table-striped">
                    <tr scope="row">
                      <td class="font-weight-bold">{{ __('Full Name') }}</td>
                      <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                      <td class="font-weight-bold">Date Of Hire</td>
                      <td>{{ $employee->hire_date }}</td>
                    </tr>
                    <tr scope="row">
                      <td class="font-weight-bold">{{ __('Date Of Hire') }}</td>
                      <td>{{ $employee->hire_date }}</td>
                      <td class="font-weight-bold">Department</td>
                      <td>{{ $employee->pan }}</td>
                    </tr>
                    <tr scope="row">
                      <td class="font-weight-bold">Gender</td>
                      <td>{{ $employee->gender }}</td>
                      <td class="font-weight-bold">Update At</td>
                      <td>{{ $employee->updated_at }}</td>
                    </tr>
                  </table>
                  </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="card card-default">
                <div class="card-header">Benefits</div>
                <div class="card-body">
                  <div class="row">
                  <table class="table table-striped">
                    <tr scope="row">
                      <td>Full Name</td>
                      <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    </tr>
                    <tr scope="row">
                      <td>Date Of Hire</td>
                      <td>{{ $employee->hire_date }}</td>
                    </tr>
                    <tr scope="row">
                      <td>Department</td>
                      <td>{{ $employee->department }}</td>
                    </tr>
                    <tr scope="row">
                      <td>Gender</td>
                      <td>{{ $employee->gender }}</td>
                    </tr>
                    <tr scope="row">
                      <td>Update At</td>
                      <td>{{ $employee->update_at }}</td>
                    </tr>
                  </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
