<?php

namespace App\Repositories;
use App\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

interface EmployeeRepositoryInterface {
    public function getEmployeeById($id);
    public function getRecordsList($currentPage = null, $columns = array('*'));
}

class EmployeeRepository implements EmployeeRepositoryInterface
{
    const CACHE_KEY = 'emp-';
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function getEmployeeById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $key
     * @return string
     */
    private function generateCacheKey($key)
    {
        return $key = static::CACHE_KEY . $key;
    }

    public function getRecordsList($currentPage = null, $columns = array('*'))
    {
      $key = 'emplist-' . $currentPage;
      if (!Cache::has($this->generateCacheKey($key))) {
        $records = $this->model->paginate(1, $columns);
        $expiresAt = now()->addMinutes(10);
        Cache::put($this->generateCacheKey($key), $records, $expiresAt);
        return $records;
      }
      return Cache::get($this->generateCacheKey($key), []);
    }
}
