<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ShowStudentController;
use Illuminate\Support\Facades\DB;


Route::get('/student/{id}', [StudentController::class, 'homepage']);
Route::get('/teacherview', function(){
    return view('teacherPage');
});


// Route::get('/', function () {
//     return view('welcome',['id' => '1005']);
// });


// Route::get('/studentview', [StudentController::class, 'index']);

// Route::get('/car', [StudentController::class, 'read']);  

// If we have multiple methods in a class use group

Route::controller(StudentController::class)->group(function() {
    Route::get('/studentview', 'index');
    Route::get('/car', 'read'); 
});

Route::resource('category', CategoryController::class);

Route::get('/showstu', ShowStudentController::class);

// Route::resource('/photo', PhotoController::class)->except(['destroy']);  // to exclude methods from the resource controller

// Route::resource('/photo', PhotoController::class)->only(['index', 'show']);  // only includes selected methods

// Route::apiResource('/photo', PhotoController::class);

Route::apiResources([
    'cars' => CarController::class,
    'photo' => PhotoController::class
]);


Route::controller(MathController::class)->group(function(){
    Route::get('/sum/{a}/{b}', 'sum')->whereNumber(['a', 'b']);
    Route::get('/subtract/{a}/{b}', 'subtract')->whereNumber(['a', 'b']);
});

Route::get('/', [HomeController::class, 'index'])->name('home');   // name methods is used to define route of this page from other page 
                                                                   // instead of hardcoded url we are going to use home


Route::get('/hello', [HelloController::class, 'welcome']);

Route::get('/home1', function(){
    return view('home');
});

