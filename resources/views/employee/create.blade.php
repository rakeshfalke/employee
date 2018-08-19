@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Create Employee</div>
                <div class="card-body">
                  @include('partials.alerts.errors')
                  @include('partials.alerts.success')
                  {!! Form::model($employee, ['action' => 'EmployeeController@store']) !!}
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          {!! Form::label('employee_id', __('Employee ID')) !!}
                          {!! Form::text('employee_id', null, ['placeholder' => __('Employee ID'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">&nbsp;</div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          {!! Form::label('title', __('Title')) !!}
                          {!! Form::select('department', array('Mr' => 'Mr', 'Ms' => 'Ms'), null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-5">
                          {!! Form::label('first_name', __('First Name')) !!}
                          {!! Form::text('first_name', null, ['placeholder' => __('First Name'), 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>
                        <div class="form-group col-md-5">
                          {!! Form::label('last_name', __('Last Name')) !!}
                          {!! Form::text('last_name', null, ['placeholder' => __('Last Name'), 'class' => 'form-control']) !!}
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          {!! Form::label('father_name', __('Father Name')) !!}
                          {!! Form::text('father_name', null, ['placeholder' => __('Father Name'),'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-4">
                          {!! Form::label('spouse_name', __('Spouse Name')) !!}
                          {!! Form::text('spouse_name', null, ['placeholder' => __('Spouse Name'),'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-2">
                          {!! Form::label('children', __('Children')) !!}
                          {!! Form::number('children', null, ['placeholder' => __('Children'), 'class' => 'form-control']) !!}
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          {!! Form::label('pan', __('PAN')) !!}
                          {!! Form::text('pan', null, ['placeholder' => __('PAN'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                          {!! Form::label('social_security', __('employee.social_security')) !!}
                          {!! Form::text('social_security', null, ['placeholder' => __('employee.social_security'), 'class' => 'form-control']) !!}
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          {!! Form::label('primary_email', __('Primary Email')) !!}
                          {!! Form::text('primary_email', null, ['placeholder' => __('Primary Email'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                          {!! Form::label('other_email', __('Other Email')) !!}
                          {!! Form::text('other_email', null, ['placeholder' => __('Other Email'), 'class' => 'form-control']) !!}
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          {!! Form::label('gender', __('Gender')) !!}
                          {!! Form::select('gender', array('male' => 'Male', 'female' => 'Female', 'other' => 'Other'), null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                          {!! Form::label('department', __('Department')) !!}
                          {!! Form::select('department', $department, null, ['class' => 'form-control']) !!}
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          {!! Form::label('nationality', __('Nationality')) !!}
                          {!! Form::select('nationality', array('1' => 'Mr', '2' => 'Ms'), null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-3">
                          {!! Form::label('marital_status', __('marital_status')) !!}
                          {!! Form::select('marital_status', array('single' => 'single', 'married' => 'married', 'unmarried' => 'unmarried', 'divorced' => 'divorced', 'widowed' => 'widowed'), null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-3">
                          {!! Form::label('dob', __('Date of birth')) !!}
                          {!! Form::date('dob', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-3">
                          {!! Form::label('hire_date', __('Hire Date')) !!}
                          {!! Form::date('hire_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Sign in</button>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
