<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'question' => 'On a scale from 1 to 5, how satisfied are you with the overall experience?',
            'survey_id' => 1, 
        ]);

        Question::create([
            'question' => 'How likely are you to recommend our product/service to a friend or colleague? (1 being least likely, 5 being most likely)',
            'survey_id' => 1, 
        ]);

        Question::create([
            'question' => 'How clear was the information provided to you? (1 being not clear at all, 5 being very clear)',
            'survey_id' => 1, 
        ]);

        Question::create([
            'question' => 'How easy was it to navigate our website/platform? (1 being very difficult, 5 being very easy)',
            'survey_id' => 1, 
        ]);

        Question::create([
            'question' => 'To what extent did our product/service meet your expectations? (1 being not at all, 5 being completely)',
            'survey_id' => 1, 
        ]);

        Question::create([
            'question' => 'How satisfied are you with the delivery time of our product/service? (1 being very dissatisfied, 5 being very satisfied)',
            'survey_id' => 1, 
        ]);

        Question::create([
            'question' => 'How likely are you to make another purchase from us in the future? (1 being not likely, 5 being very likely)',
            'survey_id' => 1, 
        ]);

        Question::create([
            'question' => 'How satisfied are you with the variety of options available? (1 being not satisfied at all, 5 being very satisfied)',
            'survey_id' => 1, 
        ]);

        Question::create([
            'question' => 'How helpful did you find our support resources? (1 being not helpful, 5 being very helpful)',
            'survey_id' => 1, 
        ]); 

        Question::create([
            'question' => 'How do you feel today?',
            'survey_id' => 1, 
        ]);
    }
}
