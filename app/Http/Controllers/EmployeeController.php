<?php

namespace App\Http\Controllers;

use App\Http\Responses\EmployeeShowResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Responses\EmployeeIndexResponse;
use App\Department as Department;
use App\Employee as Employee;

use Session;
Use Redirect;

class EmployeeController extends Controller
{
   protected $employeeModel;
   protected $depatmentModel;

   public function __construct()
   {
     // set the model
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new EmployeeIndexResponse();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee;
        $departments = \Cache::remember('departments', 24*60, function() {
            return Department::all()->pluck('name', 'id');
        });
        return view('employee.create', ['employee' => $employee, 'department' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();
        // Retrieve the validated input data...
        $employee = Employee::create($request->all());
        // redirect
        Session::flash('flash_message', 'Successfully created employee!');
        return redirect()->route('employee.show', $employee->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return new EmployeeShowResponse($uuid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = \Cache::remember('departments', 24*60, function() {
            return Department::all()->pluck('name', 'id');
        });
        return view('employee.edit', ['employee' => $employee, 'department' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $employee= Employee::findOrFail($id);
        // Retrieve the validated input data...
        $employee->fill($request->input())->save();
        // redirect
        Session::flash('flash_message', 'Successfully updated employee!');
        return redirect()->route('employee.show', $employee->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
