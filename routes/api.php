<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;


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
Route::get('/first-joined-employees', [EmployeeController::class, 'getFirstJoinedEmployees']);
Route::get('/employees-on-leave', [EmployeeController::class, 'getEmployeesOnLeave']);
Route::get('/remaining-leave-quota', [EmployeeController::class, 'getRemainingLeaveQuota']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
