<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $primaryKey = 'EvaluationID';

    protected $fillable = ['Name', 'Description'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'EvaluationID');
    }

    public function assignedEvaluations()
    {
        return $this->hasMany(AssignedEvaluation::class, 'EvaluationID');
    }
}
