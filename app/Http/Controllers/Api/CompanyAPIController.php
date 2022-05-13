<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;

class CompanyAPIController extends Controller
{
     /**
     * Return company list for api
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function allCompanies(Request $request)
    {
        $query = Company::query()->with(['departments']);
        $query->when($request->filter, function($q) use ($request) {
            return $q->where([$request->filter['field']], 'like',  "%$request->filter['value']%");
        });
        $companies = $query->paginate(20);
        return response()->json(['data' =>$companies], 200);
    }


    /**
     * Get Company By id
     *
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function companyById(Request $request, Company $company)
    {
        return response()->json(['data' => $company], 200);
    }

    /**
     * Return Company departments with filtters
     *
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function companyDepartments(Request $request, Company $company)
    {
        $query = $company->departments()->with(['employees']);
        $query->when($request->filter, function($q) use ($request) {
            return $q->where([$request->filter['field']], 'like',  "%{$request->filter['value']}%");
        });
        $departments = $query->paginate(20);
        return response()->json(['data' => $departments], 200);
    }



    /**
     * Return Company departments with filtters
     *
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function companyEmployees(Request $request, Company $company)
    {
        $query = $company->employees();
        $query->when($request->filter, function($q) use ($request) {
            return $q->where([$request->filter['field']], 'like',  "%{$request->filter['value']}%");
        });
        $employees = $query->paginate(20);
        return response()->json(['data' => $employees], 200);
    }


    /**
     * Return employees in a certain department of a company
     *
     * @param Request $request
     * @param Company $company
     * @param Department $department
     * @return \Illuminate\Http\JsonResponse
     */
    public function departmentEmployees(Request $request, Company $company, Department $department)
    {
        $query = $department->employees();
        $query->when($request->filter, function($q) use ($request) {
            return $q->where([$request->filter['field']], 'like',  "%{$request->filter['value']}%");
        });
        $employees = $query->paginate(20);
        return response()->json(['data' => $employees], 200);
    }


    public function getEmployee(Request $request, int $employee)
    {
        $emp = Employee::query()->where(['id' => $employee])->with(['department.company'])->first();
        return response()->json(['data' => $emp], 200);
    }

}
