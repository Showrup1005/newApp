<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function homepage($id){
        return view('welcome',['id'=>$id]);
    }
}

public function index(){
    $students = DB::table('students_info')->
}