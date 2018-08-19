<?php
namespace App\Repositories;

interface EmployeeInterface
{
    public function getEmployeeById($id);
    public function getRecordsList($currentPage = null, $columns = array('*'));
    public function generateCacheKey($key);
}
