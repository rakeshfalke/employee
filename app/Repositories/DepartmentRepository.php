<?php

namespace App\Repositories;
use App\Department;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    const CACHE_KEY = 'dept-';
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Department $model)
    {
        $this->model = $model;
    }

    /**
     * @param $key
     * @return string
     */
    public function generateCacheKey($key)
    {
        return $key = static::CACHE_KEY . $key;
    }

    // Get all instances of model
    public function getDepartmentList()
    {
      if (!Cache::has($this->generateCacheKey('deptlist-dropdown'))){
        $deptList = [];
        $departments = $this->model->all();
        foreach($departments as $dept){
          $deptList[$dept->id] = $dept->name;
        }
        $expiresAt = now()->addMinutes(60*24);
        Cache::put($this->generateCacheKey('deptlist-dropdown'), $deptList, $expiresAt);
        return $deptList;
      }
      return Cache::get($this->generateCacheKey('deptlist-dropdown'), []);
    }

    public function getRecordsList($currentPage = null, $columns = array('*'))
    {
      $key = 'deptlist-' . $currentPage;
      if (!Cache::has($this->generateCacheKey($key))) {
        $records = $this->model->paginate(1, $columns);
        $expiresAt = now()->addMinutes(10);
        Cache::put($this->generateCacheKey($key), $records, $expiresAt);
        return $records;
      }
      return Cache::get($this->generateCacheKey($key), []);
    }
}
