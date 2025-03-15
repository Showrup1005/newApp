<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = DB::table('questions')->get();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::get('https://quizapi.io/api/v1/questions', [
            'apiKey' => 'mgDZJkWPGfzp1XaF4jSi6Lax0uc8UZ64wAcuDr1Q',
            'limit' => 10
        ]);
        $questions = $response->json();

        foreach($questions as $question)
        {
            DB::table('questions')->insert([
                'question' => $question['question'],
                'answer_1' => $question['answers']['answer_a'],
                'answer_2' => $question['answers']['answer_b'],
                'answer_3' => $question['answers']['answer_c'],
            ]);    
        }
        return "Questions created successfully";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
