<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'code',
        'new_user_role',
        'user_id',
        'image'
    ];

    /**
     * Get the user that belong to the group.
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * Get the user that belong to the group.
     */
    public function invited()
    {
        return $this->hasMany(Groupinvitation::class,'group_id','id');
    }
}
