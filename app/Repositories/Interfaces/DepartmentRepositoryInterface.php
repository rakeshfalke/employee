<?php
namespace App\Repositories\Interfaces;

interface DepartmentRepositoryInterface {
    public function getDepartmentList();
    public function getRecordsList($currentPage = null, $columns = array('*'));
    public function generateCacheKey($key);
}
