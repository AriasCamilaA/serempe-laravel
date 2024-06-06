<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamGroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'GroupID';

    protected $fillable = [
        'Name',
        'LeaderID',
    ];

    public function leader()
    {
        return $this->belongsTo(User::class, 'LeaderID');
    }

    public function collaborators()
    {
        return $this->belongsToMany(User::class, 'group_collaborators', 'GroupID', 'CollaboratorID');
    }
}
