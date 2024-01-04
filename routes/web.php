<?php

// use App\Http\Controllers\AdminBackend\SelectPeriodController;

use App\Http\Controllers\AdminBackend\SelectPeriodController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::group(['namespace' => 'Frontend'], function () {
    Route::resource('/', 'HomeController');
});



Route::middleware(['class:3'])->group(function () {
    // Definisikan rute untuk mahasiswa di sini, misalnya dashboard.
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['namespace' => 'Backend'], function () {
        Route::resource('dashboard', 'DashboardController');
        Route::resource('profile', 'ProfileController');
        Route::resource('questionnaire', 'QuestionnaireController')->names('userQuestionnaire');
        Route::resource('user-result', 'DashboardController')->names('userResult');

        // hanya tampilan
        Route::get('/user-hasil/cetak-pdf', 'DashboardController@cetak_pdf')->name('userQuestionnaire.cetak');
        Route::get('instruction', 'UiController@instruction')->name('user.questionnaire.instruction');
        Route::get('check-questionnaire', 'UiController@checkQuestionnaire')->name('user.questionnaire.check');
        Route::get('closed-questionnaire', 'UiController@closedQuestionnaire')->name('user.questionnaire.closed');
        Route::post('/profile/update', 'ProfileController@update'); 
        Route::get('/profile/change-password', 'ProfileController@changePasswordForm')->name('profile.changePasswordForm');
        Route::post('/profile/change-password', 'ProfileController@changePassword')->name('profile.changePassword');


    });
});

Route::middleware(['class:1,2'])->group(function () {
    // Definisikan rute untuk dosen di sini, misalnya halaman admin.
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::group(['namespace' => 'AdminBackend'], function () {
        Route::resource('admin', 'AdminDashboardController')->names('adminDashboard');
        Route::resource('listuser', 'ListUserController')->names('adminListUser');
        Route::resource('listadmin', 'ListAdminController')->names('adminListAdmin');
        Route::resource('admin-questionnaire', 'AdminQuestionnaireController')->names('adminQuestionnaire');
        Route::resource('admin-period', 'AdminPeriodController')->names('adminPeriod');
        Route::resource('admin-result', 'AdminResultController')->names('adminResult');
        Route::resource('admin-profile', 'AdminProfileController')->names('adminProfile');


        // Route::get('admin-result', 'AdminResultController@index')->name('adminResult.index');
        // Route::get('admin-result/cetak', 'AdminResultController@index');
        Route::get('/hasil/cetak-pdf', 'AdminResultController@cetak_pdf')->name('userQuestionnaire.cetak');
        Route::post('/select-period', 'SelectPeriodController@update')->name('adminSelectPeriod');
        Route::post('/select-period/active', 'SelectPeriodController@active')->name('adminSelectPeriod.active');
        Route::post('/admin-profile/update', 'AdminProfileController@update'); 
        Route::get('/admin-profile/change-password', 'AdminProfileController@changePasswordForm')->name('admin-profile.changePasswordForm');
        Route::post('/admin-profile/change-password', 'AdminProfileController@changePassword')->name('admin-profile.changePassword');
        Route::post('/listadmin/add', 'ListAdminController@create'); 
       

       


        // Route::post('listuser', [UserController::class, 'store']);
    });
});
Auth::routes();
