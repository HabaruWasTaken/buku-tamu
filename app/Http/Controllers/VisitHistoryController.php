<?php

namespace App\Http\Controllers;

use App\Exports\VisitHistoriesExport;
use App\Http\Requests\VisitHistoryStoreRequest;
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

    public function store(VisitHistoryStoreRequest $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->merge([
            'date' => date('Y-m-d'),
            'time' => date('H:i:s')
        ]);
        return $this->visitHistoryService->store($request->all());
    }

    public function edit($id)
    {
        $visitHistory = $this->visitHistoryService->find($id);
        return view('visit_history._form', compact('visitHistory'));
    }

    public function update(VisitHistoryStoreRequest $request, $id)
    {
        return $this->visitHistoryService->update($request->all(), $id);
    }

    public function destroy($id)
    {
        $this->visitHistoryService->delete($id);
    }

    public function export_excel(Request $request)
    {
        $visits = $this->visitHistoryService->search($request->all());
        return Excel::download(new VisitHistoriesExport($visits), 'visit_histories.xlsx');
    }

    

    public function export_pdf(Request $request)
    {
        $visits = $this->visitHistoryService->search($request->all());

        $pdf = Pdf::loadView('exports.visit_histories', [
            'visits' => $visits
        ]);

        return $pdf->download('visit_histories.pdf');
    }
}
