<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $primaryKey = 'AnswerID';

    protected $fillable = [
        'QuestionID', 
        'Text', 
        'IsCorrect'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'QuestionID');
    }
}
