<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyEmployeeController extends Controller
{
    public function add(Request $request, Company $company)
    {
        $departments = $company->departments;
        return view("company.modals.addEmployee", compact('company', 'departments'));
    }


    public function store(EmployeeRequest $request, Company $company)
    {
        $employee = Employee::create(
            array_merge(
                $request->validated(),
                [
                    'created_user_id' => Auth::id(),
                    'employee_number' => $this->employeeNo(),
                    'company_id' => $company->id,
                ]
            )
        );
        if(!$employee) {
            return response(['message' => 'Something went wrong'], 500);
        }
        return response([
            'message' => 'employee created',
            'employee' => $employee
        ], 201);
    }


    protected function employeeNo()
    {
        $employee = Employee::query()->latest()->first();
        if (!$employee) {
            return "#EMP-" . str_pad(1, 5, 0, STR_PAD_LEFT);
        }
        $iterate = (int)str_replace('#EMP-', "", $employee->employee_no) + 1;
        return "#EMP-" . str_pad($iterate, 5, 0, STR_PAD_LEFT);
    }


    public function getAll(Request $request, Company $company)
    {
        $employees = $company->employees;
        return view("company.partials._emp_list", compact('employees'));
    }
}
