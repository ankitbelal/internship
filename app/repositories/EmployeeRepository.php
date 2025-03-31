<?php

namespace App\repositories;
use App\Models\Employee;
use App\Repositories\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct( private Employee $model)
    {
      
    }
    


    public function create($data):Employee{
       $employee= $this->model->create($data);
        return $employee;
    }

    public function getAllEmployees(){
        return $this->model->all();
    }

    public function getEmployeeById($id){
        return $this->model->find($id);
    }

    public function updateEmployee($data, $id){
        $employee = $this->model->find($id);
      $updated=  $employee->update($data);
        return $updated;
    }

    public function deleteEmployee($id){
        $employee = $this->model->find($id);
       $deleted= $employee->delete();
        return $deleted;
    }

  
}
