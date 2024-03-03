<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Question;
use App\Models\Response;

class SurveyController extends Controller
{
    public function index()
    {
        return Inertia::render('Survey/SurveyForm');
    }
    
    public function getQuestions($surveyId){

        $questions = Question::select('id','question','survey_id')->where('survey_id', $surveyId)->get();
        
        $averageResponses = Response::groupBy('question_id')
        ->selectRaw('question_id, AVG(value) as average_response')
        ->get();
        
        return Inertia::render('Survey/SurveyForm', [
            'questions' => $questions,
            'averageResponses'=>$averageResponses
        ]);

    }

   
}