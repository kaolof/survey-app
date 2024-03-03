<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Response;
use App\Models\Question;

class GraphicsController extends Controller
{
    public function index()
    {
        //$responses =Response::all();
        $averageResponses = Response::groupBy('question_id')
        ->selectRaw('question_id, AVG(value) as average_response')
        ->get();

        $questions = Question::select('question')->where('survey_id', 1)->get();
        
        
        //dd($responses);
        return Inertia::render('Survey/AverageStatistics', [
            'averageResponses' => $averageResponses,
            'questions'=> $questions,
        ]);

    }
}
