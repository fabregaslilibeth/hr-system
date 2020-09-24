<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Title;

class EmployeeController extends Controller
{
    //show all employees
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employees.index', compact('employees'));
    }

    //create employee and assign to specific department and job title
    public function create()
    {
        $departments = Department::all();
        $titles = Title::all();
        return view('backend.employees.create', compact(['departments', 'titles']));
    }

    //save the employee, with validations, and the use of route model binding
    public function store(StoreEmployeeRequest $request, Employee $employee)
    {
        $employee->create($request->all());
        return redirect()->action([self::class, 'index'], $employee)
            ->with('flash', 'New employee has been added.');
    }

    //show the selected employee, and with the use of route model binding
    public function show(Employee $employee)
    {
        return view('backend.employees.show', compact('employee'));
    }

    //edit the selected employee, and with the use of route model binding
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $titles = Title::all();
        return view('backend.employees.edit', compact(['departments', 'titles', 'employee']));
    }

    //update the selected employee, with validations, and the use of route model binding
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->action([self::class, 'index'], $employee)
            ->with('flash', $employee->name . ' has been edited.');
    }

    //edit the selected employee, and the use of route model binding
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->action([self::class, 'index'], $employee)
            ->with('flash', $employee->name . ' has been deleted.');
    }
}
