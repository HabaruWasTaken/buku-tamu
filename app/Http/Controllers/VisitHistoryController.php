<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitHistoryController extends Controller
{
    public function index()
    {
        return view('visit_history.index');
    }

    public function create()
    {
        return view('visit_history.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('visit_history.index');
    }

    public function edit($id)
    {
        return view('visit_history.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('visit_history.index');
    }

    public function destroy($id)
    {
        return redirect()->route('visit_history.index');
    }
}
