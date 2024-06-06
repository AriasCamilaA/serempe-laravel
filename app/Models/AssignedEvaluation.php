<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedEvaluation extends Model
{
    use HasFactory;

    protected $primaryKey = 'AssignedEvaluationID';

    protected $fillable = [
        'EvaluationID',
        'CollaboratorID',
        'LeaderID',
        'AssignmentDate',
        'CompletionDate',
        'Score'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'EvaluationID');
    }

    public function collaborator()
    {
        return $this->belongsTo(User::class, 'CollaboratorID');
    }

    public function leader()
    {
        return $this->belongsTo(User::class, 'LeaderID');
    }

    public function collaboratorAnswers()
    {
        return $this->hasMany(CollaboratorAnswer::class, 'AssignedEvaluationID');
    }
}
