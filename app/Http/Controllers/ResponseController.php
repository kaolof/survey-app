<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class ResponseController extends Controller
{
    public function store(Request $request)
    {   
        if (Auth::check()) {
            $userId = Auth::id();
        }

        
        $responses = json_decode($request->getContent(), true);

        foreach ($responses as $response) {
            $value = $response['value'] ?? 0;

            Response::create([
                'survey_id' => $response['survey_id'],
                'value' => $response['value'],
                'question_id' => $response['question_id'],
                'user_id' => auth()->id(), // Suponiendo que estás guardando el ID del usuario autenticado
            ]);
        }


        $surveyId = 1; 

        return redirect()->route('survey.questions', ['surveyId' => $surveyId]);
    } 

}
