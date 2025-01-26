<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;

class HomeController extends Controller
{
    public function index(){
        // return "index page";
        // return view('home.index' ,[
        //     'name' => 'Showrup'
        // ]);    // one of the ways to pass values into view is to use associative array
        return View::make('home.index')   // does the same job as the previous line
        ->with('name', 'Showrup')
        ->with('surname', 'Das')
        ->with('country', 'ge')
        ->with('job', '<b>Developer</b>')
        ->with('hobbies', ['reading', 'movies']);   // another way to pass values into view   
        // if(!View::exists('index')){
        //     dump("The view doesn't exist");
        // }
        // else{
        //     return View::first(['index', 'home.index']);   // if first index is avaible renders that otherwise renders the next one
        // }
    }
}
