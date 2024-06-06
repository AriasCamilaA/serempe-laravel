<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollaboratorAnswer extends Model
{
    use HasFactory;

    protected $primaryKey = 'CollaboratorAnswerID';

    protected $fillable = ['AssignedEvaluationID', 'QuestionID', 'AnswerID'];

    public function assignedEvaluation()
    {
        return $this->belongsTo(AssignedEvaluation::class, 'AssignedEvaluationID');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'QuestionID');
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'AnswerID');
    }
}
