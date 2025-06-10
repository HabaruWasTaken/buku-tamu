<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct()
    {
        $this->employeeService = new EmployeeService();
    }

    public function index()
    {  
        $employees = $this->employeeService->search();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $this->employeeService->store($request->all());
        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $employee = $this->employeeService->find($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $this->employeeService->update($request->all(), $id);
        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        $this->employeeService->delete($id);
        return redirect()->route('employee.index');
    }
}
