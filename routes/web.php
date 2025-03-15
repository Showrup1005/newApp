<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ShowStudentController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
use App\Http\Controllers\GoogleController;


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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/welcome', [AdminController::class, 'usercheck'])->middleware('auth', 'admin');

Route::get('/upload', [App\Http\Controllers\HomeController::class, 'uploadIndex'])->name('upload');
Route::post('/upload', [App\Http\Controllers\HomeController::class, 'storeImage'])->name('image.store');

Route::get('fetchQuestion', [QuestionController::class, 'create']);
Route::get('quiz', [QuestionController::class, 'index']);

Route::get('/pdf', [App\Http\Controllers\PDFController::class, 'index'])->name('pdf.generate');
Route::get('stripe', [StripeController::class, 'index']);
Route::post('stripe', [StripeController::class, 'charge'])->name('stripe.charge');

Route::get('send-email', [MailController::class, 'sendEmail']);
// Route::get('', [MailController::class, 'sendEmail']);

Auth::routes([
    'verify' => true,
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");


Route::get('/notification', function () {
    return view('notification')->name('notification');
});