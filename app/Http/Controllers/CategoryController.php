<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'nullable'
        ]);
        $categories = DB::table('categories')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0
        ]);
        return redirect()->route('category.index')->with('msg', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'nullable'
        ]);
        $categories = DB::table('categories')->where('id', $category->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0
        ]);
        return redirect()->route('category.index')->with('msg', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::table('categories')->where('id', $category->id)->delete();
        return redirect()->route('category.index')->with('error', 'Category deleted successfully');
    }
}
