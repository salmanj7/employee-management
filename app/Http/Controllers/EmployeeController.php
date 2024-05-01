<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeCreateRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create()
    {
        $companies = Company::all();
        return view('employee-create',compact('companies'));
    }

    public function store(EmployeeCreateRequest $request)
    {
        $validatedData = $request->validated();
        
        $employee = Employee::create($validatedData);

        return redirect()->route('employee.show', $employee->id);
    }

    public function show(Employee $employee)
    {
        return view('employee-show',compact('employee'));
    }
}
