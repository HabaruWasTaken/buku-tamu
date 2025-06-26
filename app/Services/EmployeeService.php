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
    
    public function find($value, $column = 'id')
    {
        return Employee::where($column, $value)->first();
    }
    
    public function store($params)
    {
        return Employee::create($params);
    }
    
    public function update($params, $id)
    {
        $employee = Employee::find($id);
        $employee->update($params);
        return $employee;
    }
    
    public function delete($id)
    {
        $employee = Employee::find($id);
        try {
            $employee->delete();
        } catch (\Exception $e) {
            return ["error" => "Failed to delete employee: \"".$employee->name."\"! This data currently being used."];
        }
        return $employee;
    }

    public function getID($request, $id = ''){
        $position = explode("-", $request->position)[1];
        $division = explode("-", $request->division)[1];
        $divisions = [
            '1' => 'A',
            '2' => 'B',
            '3' => 'C',
            '4' => 'D',
            '5' => 'E',
            '6' => 'F',
        ];
        $divisions[$division];
        $no_id = Employee::orderByDesc('id');
        if ($id !== '') {
            $no_id = $no_id->where('id', $id)->first()->id;  
        } else if($no_id->first() === null) {
            $no_id = 0;
        } else {
            $no_id = $no_id->first()->id;  
        }
        $newNumber = str_pad($no_id + 1, 3, '0', STR_PAD_LEFT);
        $no_id = $divisions[$division] . $position . now()->format('y') . $newNumber;
        return $no_id;
    }
}