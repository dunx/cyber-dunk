<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
  /**
  * Render a list of a resource.
  **/
  public function index()
  {
    return view('employee.index', [
      'page_title' => 'Employees',
      'employees' => Employee::orderBy('last_name')->orderBy('first_name')->paginate(10),
    ]);

  }
  /**
  * Show a single resource.
  **/
  public function show(Employee $employee)
  {
    return view('employee.show', [
      'page_title' => $employee->last_name .', '. $employee->first_name,
      'employee' => $employee,
    ]);
  }

  /**
  * Shows a view to create a new resource.
  **/
  public function create()
  {
    // Get all companies for select dropdown.
    $companies = Company::orderBy('name')->get();

    return view('employee.create', [
      'page_title' => 'Add an Employee',
      'companies' => $companies,
    ]);
  }

  /**
  * Persist the new resource.
  **/
  public function store()
  {
    Employee::create($this->validateEmployee());

    return redirect(route('employee.index'));
  }

  /**
  * Shows a view to edit an existing resource.
  **/
  public function edit(Employee $employee)
  {
    // Get all companies for dropdown.
    $companies = Company::orderBy('name')->get();

    return view('employee.edit', [
      'page_title' => 'Edit Employee, '. $employee->first_name .' '. $employee->last_name,
      'employee' => $employee,
      'companies' => $companies,
    ]);
  }

  /**
  * Persist the edited resource.
  **/
  public function update(Employee $employee)
  {
    $employee->update($this->validateEmployee());

    return redirect(route('employee.show', $employee));
  }

  /**
  * Delete the resource.
  **/
  public function destroy(Employee $employee)
  {
    $employee->delete();

    return redirect(route('employee.index'));
  }

  /**
  * Confirm before delete.
  **/
  public function confirmDelete(Employee $employee)
  {
    return view('employee.confirmDelete', [
      'employee' => $employee,
      'page_title' => 'Delete employee, '. $employee->first_name .' '. $employee->last_name,
    ]);
  }

  /**
  * Validate the employee resource.
  **/
  protected function validateEmployee()
  {
    return request()->validate([
      'first_name' => ['required', 'min:2'],
      'last_name'  => ['required', 'min:2'],
      'email'      => ['required', 'email'],
      'phone'      => 'required',
      'company_id' => 'required',
    ]);
  }
}
