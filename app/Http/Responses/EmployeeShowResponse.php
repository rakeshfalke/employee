<?php
/**
 * Created by PhpStorm.
 * User: rakesh.falke
 * Date: 25/08/18
 * Time: 11:16 PM
 */

namespace App\Http\Responses;
use App\Employee as Employee;


use Illuminate\Contracts\Support\Responsable;

class EmployeeShowResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|void
     */
    public function toResponse($request)
    {
        $employee = \Cache::remember('employee-id-' . $this->id, 24*60, function() {
            return Employee::findOrFail($this->id);
        });
        return view('employee.show')->with('employee', $employee);
    }
}