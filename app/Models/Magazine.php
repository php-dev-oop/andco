<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    /**
     * Get the group that belong to the post.
     */
    public function group()
    {
        return $this->belongsTo(Group::class,'group_id','id');
    }

    /**
     * Get the user that belong to the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
