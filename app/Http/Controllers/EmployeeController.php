<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Repositories\EmployeeRepository;

use Session;
Use Redirect;

class EmployeeController extends Controller
{
   protected $model;

   public function __construct(Employee $employee)
   {
     // set the model
     $this->model = new EmployeeRepository($employee);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('employee.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee;
        $department = Cache::get('department');//DB::table('department')->pluck('name','id');
        //$expiresAt = now()->addMinutes(10);
        //Cache::put('department', $department, $expiresAt);
        return view('employee.create', ['employee' => $employee, 'department' => $department ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
      // Retrieve the validated input data...
      $employee = Employee::create($request->all());
      // redirect
      Session::flash('message', 'Successfully created employee!');
      return redirect()->route('employee.show', $employee->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('employee.show')->with('employee', $this->model->getById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
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
