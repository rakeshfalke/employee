<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

use Session;
Use Redirect;

class EmployeeController extends Controller
{
   protected $employeeModel;
   protected $depatmentModel;

   public function __construct(Employee $employee, Department $depatment)
   {
     // set the model
     $this->employeeModel = $employee;
     $this->depatmentModel = $depatment;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = $this->employeeModel->paginate(1, array('*'));
        return view('employee.list')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departmentList = [];
        $employee = new Employee;
        $departments = $this->depatmentModel->get(['id', 'name'])->toArray();
        foreach ($departments as $dept) {
            $departmentList[$dept['id']] = $dept['name'];
        }
        return view('employee.create', ['employee' => $employee, 'department' => $departmentList]);
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
      return view('employee.show')->with('employee', $this->employeeModel->findOrFail($id));
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
