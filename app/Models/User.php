<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'Type',
        'RoleID',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'RoleID');
    }

    public function teamGroups()
    {
        return $this->hasMany(TeamGroup::class, 'LeaderID');
    }

    public function groupCollaborators()
    {
        return $this->belongsToMany(TeamGroup::class, 'group_collaborators', 'CollaboratorID', 'GroupID');
    }

    public function assignedEvaluations()
    {
        return $this->hasMany(AssignedEvaluation::class, 'CollaboratorID');
    }
}
