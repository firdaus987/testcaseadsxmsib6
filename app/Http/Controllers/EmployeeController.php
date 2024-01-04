<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getFirstJoinedEmployees()
    {
        $employees = Employee::orderBy('tanggal_bergabung')->take(3)->get();
        return response()->json(['employees' => $employees]);
    }

    public function getEmployeesOnLeave()
    {
        $employeesOnLeave = Employee::has('leaves')->get();
        return response()->json(['employeesOnLeave' => $employeesOnLeave]);
    }

    public function getRemainingLeaveQuota()
    {
        $employeesWithRemainingLeave = Employee::withSum('leaves', 'lama_cuti')->get();
        return response()->json(['employeesWithRemainingLeave' => $employeesWithRemainingLeave]);
    }
}