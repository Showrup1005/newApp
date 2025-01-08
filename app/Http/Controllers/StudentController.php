<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function homepage($id){
        return view('welcome',['id'=>$id]);
    }

    public function index(){
        $students = DB::table('students_info')->get();

        return view('studentPage', compact('students'));
    }
}

