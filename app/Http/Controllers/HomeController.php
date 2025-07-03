<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitHistoryStoreRequest;
use App\Services\EmployeeService;
use App\Services\VisitHistoryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $employeeService, $visitHistoryService;

    public function __construct()
    {
        $this->employeeService = new EmployeeService;
        $this->visitHistoryService = new VisitHistoryService;
    }

    public function index(Request $request){
        $employee_count = $this->employeeService->search(['count' => 1]);
        $visit_count = $this->visitHistoryService->search(['count' => 1]);
        $get_data = $this->visitHistoryService->getData([
            'first' => $request->first_month,
            'last' => $request->last_month
        ]);
        $request->merge([
                'date' => date('d-m-Y'), 
                'paginate' => 10
        ]);
        $visit_histories_today = $this->visitHistoryService->search($request->all());
        $employees = $this->employeeService->search();
        
        return view('dashboard', compact(['employee_count', 'visit_count', 'get_data', 'visit_histories_today', 'employees']));
    }

    public function store(VisitHistoryStoreRequest $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->merge([
            'date' => date('Y-m-d'),
            'time' => date('H:i:s')
        ]);
        $this->visitHistoryService->store($request->all());
        return redirect()->route('dashboard'); 
    }
}
