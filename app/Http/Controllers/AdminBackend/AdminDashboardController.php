<?php

namespace App\Http\Controllers\AdminBackend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
  public function getEmployeesWithRemainingLeave()
  {
      return User::select('users.id', 'users.no_induk', 'users.nama_lengkap', DB::raw('12 - SUM(cuti.lama) as sisa_cuti'))
          ->leftJoin('cuti', 'users.id', '=', 'cuti.id')
          ->where('users.kelas_user', 3) 
          ->groupBy('users.no_induk', 'users.nama_lengkap', 'users.id')
          ->get();
  }
  
  public function getEmployeesOnLeave()
  {
    return User::select('users.id', 'users.no_induk', 'users.nama_lengkap')
        ->leftJoin('cuti', 'users.id', '=', 'cuti.id')
        ->where('users.kelas_user', 3)
        ->whereNotNull('cuti.id') 
        ->groupBy('users.no_induk', 'users.nama_lengkap', 'users.id')
        ->get();
  }

  public function getEmployeesOnLeaveWithRemainingLeave()
  {
      $employeesWithRemainingLeave = $this->getEmployeesWithRemainingLeave();

      return $employeesWithRemainingLeave;
  }

 
  public function index()
  {
      $employeesWithRemainingLeave = $this->getEmployeesWithRemainingLeave();
      $employeesOnLeaveData = $this->getEmployeesOnLeave();
      $employeesOnLeaveWithRemainingLeave = $this->getEmployeesOnLeaveWithRemainingLeave();
  
      return view('admin_backend.admin_dashboard', compact('employeesWithRemainingLeave', 'employeesOnLeaveData', 'employeesOnLeaveWithRemainingLeave'));
  }
  

}
