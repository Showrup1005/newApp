<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\DB;
Route::get('/student/{id}', [StudentController::class, 'homepage']);


// Route::get('/', function () {
//     return view('welcome');
// });
