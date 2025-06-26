<?php

namespace App\Http\Controllers;

use App\Exports\VisitHistoriesExport;
use App\Services\VisitHistoryService;
use App\Services\EmployeeService;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function index()
    {
        return view('visit_history.index');
    }
    
    public function search(Request $request)
    {
        $visitHistories = $this->visitHistoryService->search($request);
        return view('visit_history._table', compact('visitHistories'));
    }

    public function create()
    {
        $employees = $this->employeeService->search();
        return view('visit_history._form', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'date' => unformat_date($request->date),
            'time' => format_time($request->time, false)
        ]);
        return $this->visitHistoryService->store($request->all());
    }

    public function edit($id)
    {
        $visitHistory = $this->visitHistoryService->find($id);
        return view('visit_history._form', compact('visitHistory'));
    }

    public function update(Request $request, $id)
    {
        return $this->visitHistoryService->update($request->all(), $id);
    }

    public function destroy($id)
    {
        $this->visitHistoryService->delete($id);
    }

    public function export_excel()
    {
        return Excel::download(new VisitHistoriesExport, 'visit_histories.xlsx');
    }

    

    public function export_pdf()
    {
        $visits = $this->visitHistoryService->search();

        $pdf = Pdf::loadView('exports.visit_histories', [
            'visits' => $visits
        ]);

        return $pdf->download('visit_histories.pdf');
    }
}
