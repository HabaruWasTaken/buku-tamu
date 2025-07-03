<?php

namespace App\Services;

use App\Models\VisitHistory;

class VisitHistoryService extends Service
{
    public function search($params = [])
    {
        $visitHistory = VisitHistory::orderBy('date', 'desc');

        $time_order = $params['time_order'] ?? 'desc';
        if ($time_order !== '') $visitHistory = $visitHistory->orderBy('time', $time_order);

        $name = $params['name'] ?? '';
        if ($name !== '') $visitHistory = $visitHistory->where('name', 'like', "%$name%");

        $company = $params['company'] ?? '';
        if ($company !== '') $visitHistory = $visitHistory->where('company', 'like', "%$company%");

        $employee_name = $params['employee_name'] ?? '';
        if ($employee_name !== '') $visitHistory = $visitHistory->whereHas('employee', fn($employee) => $employee->where('name', 'like', "%$employee_name%"));

        $date = $params['date'] ?? '';
        if ($date !== '') $params['date'] = unformat_date($date);

        $range = $params['range'] ?? '';
        if (($range !== '') && (count(explode(" to ", $range)) > 1)) {
            $from = unformat_date(explode(" to ", $range)[0]);
            $to = unformat_date(explode(" to ", $range)[1]);
            $visitHistory = $visitHistory->whereBetween('date', [$from, $to]);
        }

        $year = $params['year'] ?? '';

        $month = $params['month'] ?? '';
        if ($month !== '') $visitHistory = VisitHistory::orderBy('id')->where('date', 'like', $year."-$month-%");

        $visitHistory = $this->searchFilter($params, $visitHistory, ['date']);
        return $this->searchResponse($params, $visitHistory);
    }
    
    public function find($value, $column = 'id')
    {
        return VisitHistory::where($column, $value)->first();
    }
    
    public function store($params)
    {
        return VisitHistory::create($params);
    }
    
    public function update($params, $id)
    {
        $visitHistory = VisitHistory::find($id);
        $visitHistory->update($params);
        return $visitHistory;
    }
    
    public function delete($id)
    {
        $visitHistory = VisitHistory::find($id);
        try {
            $visitHistory->delete();
        } catch (\Exception $e) {
            return ["error" => "Delete failed! This data currently being used."];
        }
        return $visitHistory;
    }

    public function getData($months = [], $year = 2025)
    {
        $first_month = $months['first'] ?? 1;
        if ($first_month !== 1) $first_month = array_search($first_month, list_bulan())+1;

        $last_month = $months['last'] ?? 12;
        if ($last_month !== 12) $last_month = array_search($last_month, list_bulan())+1;

        $data = [];
        $months = [];
        for ($i = $first_month; $i <= $last_month; $i++) {
            $month = $i;
            if ($month < 10) $month = "0" . $month;
            $count = $this->search(['month' => $month, 'year' => $year])->count();
            if (true) {
                array_push($data, $count);
                array_push($months, list_bulan()[$i-1]);
            }
        }

        return (object)['data' => $data, 'months' => $months];
    }
}