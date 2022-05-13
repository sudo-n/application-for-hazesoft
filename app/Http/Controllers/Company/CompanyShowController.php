<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyShowController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::query()->where(['created_user_id' => auth()->id()])->get();
        return view('company.index', compact('companies'));
    }

    public function addCompany(Request $request)
    {
        return view("company.modals.addCompany");
    }

    public function view(Request $request, Company $company)
    {
        return view("company.detail", compact('company'));
    }



    //


}
