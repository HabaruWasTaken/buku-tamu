<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService extends Service
{
    public function search($params = [])
    {
        $employee = Employee::orderBy('id');

        $name = $params['name'] ?? '';
        if ($name !== '') $employee = $employee->where('name', 'like', "%$name%");
        
        $employee = $this->searchFilter($params, $employee, ['no_id', 'position', 'division']);
        return $this->searchResponse($params, $employee);
    }
    
    public function find($column = 'id', $value)
    {
        return Employee::where($column, $value)->first();
    }
    
    public function store()
    {
        return Employee::create($params);
    }
    
    public function update($id, $params)
    {
        $employee = Employee::find($id);
        $employee->update($params);
        return $employee;
    }
    
    public function delete($id, $params)
    {
        $employee = Employee::find($id);
        $employee->delete($params);
        return $employee;
    }
}