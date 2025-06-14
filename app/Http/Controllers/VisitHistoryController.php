<?php

namespace App\Http\Controllers;

use App\Exports\VisitHistoriesExport;
use App\Services\VisitHistoryService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VisitHistoryController extends Controller
{
    protected $visitHistoryService;
    protected $employeeService;

    public function __construct()
    {
        $this->visitHistoryService = new VisitHistoryService;
        $this->employeeService = new EmployeeService;
    }
    
    public function index(Request $request)
    {
        $request->merge(['paginate' => 10]);
        $visitHistories = $this->visitHistoryService->search($request);
        return view('visit_history.index', compact('visitHistories'));
    }

    public function create()
    {
        $employees = $this->employeeService->search();
        return view('visit_history.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'date' => unformat_date($request->date),
            'time' => format_time($request->time, false)
        ]);
        $this->visitHistoryService->store($request->all());
        return redirect()->route('visit_history.index');    
    }

    public function edit($id)
    {
        $visitHistory = $this->visitHistoryService->find($id);
        return view('visit_history.edit', compact('visitHistory'));
    }

    public function update(Request $request, $id)
    {
        $this->visitHistoryService->update($request->all(), $id);
        return redirect()->route('visit_history.index');
    }

    public function destroy($id)
    {
        $this->visitHistoryService->delete($id);
        return redirect()->route('visit_history.index');
    }

    public function export()
    {
        return Excel::download(new VisitHistoriesExport, 'visit_histories.xlsx');
    }
}
