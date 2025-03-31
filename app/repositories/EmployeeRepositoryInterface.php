<?php

namespace App\Repositories;
use App\Models\Employee;

interface EmployeeRepositoryInterface
{
    public function create(array $data):Employee;

    public function getAllEmployees();

    public function getEmployeeById($id);

    public function updateEmployee(array $data, $id);
    public function deleteEmployee($id);

   


}



?>