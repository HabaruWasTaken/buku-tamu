<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Services\VisitHistoryService;

class ReportController extends Controller
{
    protected $employeeService, $visitHistoryService;

    public function __construct()
    {
        $this->employeeService = new EmployeeService;
        $this->visitHistoryService = new VisitHistoryService;
    }

    public function index(Request $request)
    {
        $employee_count = $this->employeeService->search(['count' => 1]);
        $visit_count = $this->visitHistoryService->search(['count' => 1]);
        $get_data = $this->visitHistoryService->getData([
            'first' => $request->first_month,
            'last' => $request->last_month
        ]);
        $visit_histories_lastest = $this->visitHistoryService->search(['limit' => 5]);
        return view('report', compact(['employee_count', 'visit_count', 'get_data', 'visit_histories_lastest']));
    }
}
