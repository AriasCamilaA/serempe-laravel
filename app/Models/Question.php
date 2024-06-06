<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $primaryKey = 'QuestionID';

    protected $fillable = [
        'EvaluationID', 
        'Text'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'EvaluationID');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'QuestionID');
    }
}
