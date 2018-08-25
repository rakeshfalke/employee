<?php
/**
 * Created by PhpStorm.
 * User: rakesh.falke
 * Date: 25/08/18
 * Time: 10:55 PM
 */
namespace App\Http\Responses;

use App\Employee as Employee;
use Illuminate\Contracts\Support\Responsable;

class EmployeeIndexResponse implements Responsable
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        $page = $request->has('page') ? $request->query('page') : 1;
        $employees = \Cache::remember('employee-list-' . $page, 5, function() {
            return Employee::paginate(1, array('*'));
        });
        return view('employee.list')->with('employees', $employees);
    }
}