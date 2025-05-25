<?php

namespace App\Services;

use App\Models\VisitHistory;

class VisitHistoryService extends Service
{
    public function search($params = [])
    {
        $visitHistory = VisitHistory::orderBy('id');

        $name = $params['name'] ?? '';
        if ($name !== '') $visitHistory = $visitHistory->where('name', 'like', "%$name%");

        $company = $params['company'] ?? '';
        if ($company !== '') $visitHistory = $visitHistory->where('company', 'like', "%$company%");

        $employee_name = $params['employee_name'] ?? '';
        if ($employee_name !== '') $visitHistory = $visitHistory->whereHas('employee', fn($employee) => $employee->where('name', 'like', "%$employee_name%"));

        $visitHistory = $this->searchFilter($params, $visitHistory, ['date']);
        return $this->searchResponse($params, $visitHistory);
    }
    
    public function find($column = 'id', $value)
    {
        return VisitHistory::where($column, $value)->first();
    }
    
    public function store()
    {
        return VisitHistory::create($params);
    }
    
    public function update($id, $params)
    {
        $visitHistory = VisitHistory::find($id);
        $visitHistory->update($params);
        return $visitHistory;
    }
    
    public function delete($id, $params)
    {
        $visitHistory = VisitHistory::find($id);
        $visitHistory->delete($params);
        return $visitHistory;
    }
}