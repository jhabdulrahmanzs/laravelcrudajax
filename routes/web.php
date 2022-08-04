<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController; 
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

route::get('employee',[EmployeeController::class,'index']);
route::get('add-employee',[EmployeeController::class,'create']);
route::post('add-employee',[EmployeeController::class,'store']);
route::get('fetch-employee',[EmployeeController::class,'fetch']);
route::get('edit-employee/{id}',[EmployeeController::class,'edit']);
route::put('update-employee/{id}',[EmployeeController::class,'update']);
route::get('delete-employee/{id}',[EmployeeController::class,'destroy']);
route::get('search-employee',[EmployeeController::class,'search']);