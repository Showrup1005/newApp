<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function uploadIndex(){
        return view('Upload.upload');
    }
    public function storeImage(Request $request){
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $path = public_path('images').'/'.$imageName;

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
