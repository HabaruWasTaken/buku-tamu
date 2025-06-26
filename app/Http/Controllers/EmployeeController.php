<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use App\Services\DocumentService;
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
        return view('employee.index');
    }

    public function search(Request $request)
    {
        $employees = $this->employeeService->search($request);
        return view('employee._table', compact('employees'));
    }

    public function create()
    {
        return view('employee._form');
    }

    public function store(Request $request)
    {
        $no_id = $this->employeeService->getID($request);
        $request->merge(['no_id' => $no_id]);

        $filename = DocumentService::save_file($request, 'photo_profile', 'public/profiles');
        if ($filename !== '') $request->merge(['photo' => $filename]);

        return $this->employeeService->store($request->all());
    }

    public function edit($id)
    {
        $employee = $this->employeeService->find($id);
        return view('employee._form', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $no_id = $this->employeeService->getID($request, $id);
        $request->merge(['no_id' => $no_id]);

        $filename = DocumentService::save_file($request, 'photo_profile', 'public/profiles');
        if ($filename !== '') $request->merge(['photo' => $filename]);

        return $this->employeeService->update($request->all(), $id);
    }

    public function destroy($id)
    {
        $employee = $this->employeeService->find($id);
        if (isset($employee->photo)) DocumentService::delete_file($employee->photo);
        return $this->employeeService->delete($id);
    }
}
