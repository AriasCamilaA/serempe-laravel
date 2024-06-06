<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupCollaborator extends Pivot
{
    use HasFactory;

    protected $table = 'group_collaborators';

    public function group()
    {
        return $this->belongsTo(TeamGroup::class, 'GroupID');
    }

    public function collaborator()
    {
        return $this->belongsTo(User::class, 'CollaboratorID');
    }
}
