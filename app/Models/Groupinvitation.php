<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\User;

class Groupinvitation extends Model
{
    use HasFactory;

    protected $table = 'group_invitations';

    /**
     * Get the user that belong to the group.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the user that belong to the group.
     */
    public function group()
    {
        return $this->hasMany(Group::class, 'id', 'group_id');
    }

    /**
     * Get the user that belong to the group.
     */
    public function approvedby()
    {
        return $this->hasMany(User::class, 'id', 'approve_by');
    }
}
