<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Question;


class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'user_id',
        'value',
        'survey_id',
    ];

    // Relación con la tabla de preguntas
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // Relación con la tabla de usuarios
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
