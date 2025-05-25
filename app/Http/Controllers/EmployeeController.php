<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        return view('employee.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        return redirect()->route('employee.index');
    }
}
