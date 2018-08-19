<?php
namespace App\Repositories;

interface DepartmentInterface {
    public function getDepartmentList();
    public function getRecordsList($currentPage = null, $columns = array('*'));
    public function generateCacheKey($key);
}
