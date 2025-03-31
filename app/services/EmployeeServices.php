<?php

namespace App\services;

use App\repositories\EmployeeRepository;

class EmployeeServices
{
    /**
     * Create a new class instance.
     */
    public function __construct(public EmployeeRepository $employeeRepository)
    {
       
    }
   public function getAllEmployees(){ 
         return $this->employeeRepository->getAllEmployees();
    }


    public function createEmployee($data){
        return $this->employeeRepository->create($data);
    }

    public function getEmployeeById($id){
        return $this->employeeRepository->getEmployeeById($id);
    }

    public function updateEmployee($data, $id){
        return $this->employeeRepository->updateEmployee($data, $id);
    }

    public function deleteEmployee($id){
        return $this->employeeRepository->deleteEmployee($id);
    }

 
}
