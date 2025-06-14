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

    public function index(Request $request)
    {
        $request->merge(['paginate' => 10]);
        $employees = $this->employeeService->search($request);
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $no_id = $this->employeeService->getID($request);
        $request->merge(['no_id' => $no_id]);

        $filename = DocumentService::save_file($request, 'photo_profile', 'public/profiles');
        if ($filename !== '') $request->merge(['photo' => $filename]);

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
        $no_id = $this->employeeService->getID($request, $id);
        $request->merge(['no_id' => $no_id]);

        $filename = DocumentService::save_file($request, 'photo_profile', 'public/profiles');
        if ($filename !== '') $request->merge(['photo' => $filename]);

        $this->employeeService->update($request->all(), $id);
        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        $employee = $this->employeeService->find($id);
        DocumentService::delete_file($employee->photo);
        $this->employeeService->delete($id);
        return redirect()->route('employee.index');
    }
}
