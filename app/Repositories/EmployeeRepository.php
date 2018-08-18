<?php

namespace App\Repositories;
use App\Employee;
use Illuminate\Database\Eloquent\Model;

interface EmployeeRepositoryInterface {
    public function getById($id);
}

class EmployeeRepository implements EmployeeRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function getById($id)
    {
        return $this->model->find($id);
    }
}
