<?php

use App\Http\Controllers\Api\CompanyAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/companies', [CompanyAPIController::class, 'allCompanies']);
Route::get('/company/{company}', [CompanyAPIController::class, 'companyById']);
Route::get('/company/{company}/departments', [CompanyAPIController::class, 'companyDepartments']);
Route::get('/company/{company}/employees', [CompanyAPIController::class, 'companyEmployees']);


Route::get('/company/{company}/department/{department}/employees', [CompanyAPIController::class, 'departmentEmployees']);
Route::get('/employee/{employee}', [CompanyAPIController::class, 'getEmployee']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
