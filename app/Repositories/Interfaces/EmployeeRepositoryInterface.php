<?php
namespace App\Repositories\Interfaces;

interface EmployeeRepositoryInterface
{
    public function getEmployeeById($id);
    public function getRecordsList($currentPage = null, $columns = array('*'));
    public function generateCacheKey($key);
}
