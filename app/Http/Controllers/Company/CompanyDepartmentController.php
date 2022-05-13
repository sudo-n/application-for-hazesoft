<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDepartmentController extends Controller
{
    public function add(Request $request, Company $company)
    {
        return view("company.modals.addDepartment", compact('company'));
    }


    public function store(DepartmentRequest $request, Company $company)
    {
        return Department::create(
            array_merge(
                $request->validated(),
                ['company_id' => $company->id, 'created_user_id' => Auth::id()]
            )
        );
    }


    public function getAll(Request $request, Company $company)
    {
        $departments = $company->departments;
        return view("company.partials._dept_list", compact('departments'));
    }
}
