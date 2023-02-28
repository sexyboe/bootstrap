<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;
use App\Models\Department;
use App\Models\User;
use App\Models\Leave;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('test');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/department', function () {

    $departments = Department::all();
    return view('department', ['departments' => $departments]);
});



Auth::routes();

Route::post('/upload_post', [PostController::class, 'upload_post']);

Route::get('/my_leave_list/{id}', [LeaveController::class, 'my_leave_list']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add_employee', [App\Http\Controllers\HomeController::class, 'add_employee'])->name('add_user');
Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'employee']);
Route::get('/newemployee/{id}', [App\Http\Controllers\EmployeeController::class, 'newemployee']);
Route::get('/salary/{id}', [App\Http\Controllers\EmployeeController::class, 'salary'])->name('salary');
Route::post('/addEmployee', [App\Http\Controllers\EmployeeController::class, 'addEmployee'])->name('addUser');
Route::post('/editEmployee', [App\Http\Controllers\EmployeeController::class, 'editEmployee'])->name('editEmployee');
Route::get('/edit_employee/{id}', [App\Http\Controllers\EmployeeController::class, 'edit_employee'])->name('editEmployee');
Route::get('/delete_employee/{id}', [App\Http\Controllers\EmployeeController::class, 'deleteEmployee'])->name('editEmployee');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/department', [App\Http\Controllers\HomeController::class, 'department'])->name('department');

Route::get('/leave_apply', [App\Http\Controllers\HomeController::class, 'applyLeave'])->name('applyLeave');
Route::post('/leave_action', [App\Http\Controllers\LeaveController::class, 'leave_action'])->name('leave_action');
Route::get('/pending', [App\Http\Controllers\LeaveController::class, 'pending'])->name('pending');
Route::get('/approve', [App\Http\Controllers\LeaveController::class, 'approve'])->name('approve');
Route::get('/decline', [App\Http\Controllers\LeaveController::class, 'decline'])->name('decline');

Route::get('/pending/{id}', [App\Http\Controllers\LeaveController::class, 'pending_user'])->name('pending');
Route::get('/approve/{id}', [App\Http\Controllers\LeaveController::class, 'approve_user'])->name('approve');
Route::get('/decline/{id}', [App\Http\Controllers\LeaveController::class, 'decline_user'])->name('decline');
Route::get('/leave_list', [App\Http\Controllers\LeaveController::class, 'leave_list'])->name('leave_list');
Route::get('/mynewleaveList/{id}', [App\Http\Controllers\LeaveController::class, 'newl'])->name('leave_list');
Route::post('/update_status/{id}', [App\Http\Controllers\LeaveController::class, 'update_status'])->name('update_status');
Route::post('/update_status_pending/{id}', [App\Http\Controllers\LeaveController::class, 'update_status_pending'])->name('update_status');
Route::get('/leave_form_view/{id}', [App\Http\Controllers\LeaveController::class, 'leave_form_view'])->name('leave_form_view');

Route::post('/addDepartment', [App\Http\Controllers\DepartmentController::class, 'addDepartment'])->name('addDepartment');
Route::post('/updateDepartment', [App\Http\Controllers\DepartmentController::class, 'updateDepartment'])->name('updateDepartment');
Route::get('/update_department/{id}', [App\Http\Controllers\DepartmentController::class, 'update_department'])->name('update_department');
Route::get('/deleteDepartment/{id}', [App\Http\Controllers\DepartmentController::class, 'delete'])->name('delete');


Route::get('/position', [App\Http\Controllers\HomeController::class, 'position'])->name('position');
Route::post('/addPosition', [App\Http\Controllers\PositionController::class, 'addPosition'])->name('addPosition');
Route::post('/updatePosition', [App\Http\Controllers\PositionController::class, 'updatePosition'])->name('updatePosition');
Route::get('/update_position/{id}', [App\Http\Controllers\PositionController::class, 'update_position'])->name('update_position');
Route::get('/deletePosition/{id}', [App\Http\Controllers\PositionController::class, 'delete'])->name('detele');