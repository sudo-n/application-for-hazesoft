<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyRequest;

class CompanySaveUpdateController extends Controller
{
    public function store(CompanyRequest $request)
    {
        // return Company::query()->latest()->first();
        return Company::create(
            array_merge(
                ['created_user_id' => Auth::id()],
                $request->validated()
            )
        );
    }
}
