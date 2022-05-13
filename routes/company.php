<?php

use App\Http\Controllers\Company\CompanyDepartmentController;
use App\Http\Controllers\Company\CompanyEmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CompanyShowController;
use App\Http\Controllers\Company\CompanySaveUpdateController;

Route::group(['prefix' => '/company'], function() {
    Route::get('/add', [CompanyShowController::class, 'addCompany']);
    Route::post('/store', [CompanySaveUpdateController::class, 'store']);
    Route::get('/view/{company}', [CompanyShowController::class, 'view']);

    //Route for departments and employees
    Route::get('{company}/department/add', [CompanyDepartmentController::class, 'add']);
    Route::post('{company}/department/store', [CompanyDepartmentController::class, 'store']);
    Route::get('{company}/department/getAll', [CompanyDepartmentController::class, 'getAll']);

    Route::get('{company}/employee/add', [CompanyEmployeeController::class, 'add']);
    Route::post('{company}/employee/store', [CompanyEmployeeController::class, 'store']);
    Route::get('{company}/employee/getAll', [CompanyEmployeeController::class, 'getAll']);
});
