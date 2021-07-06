<?php

namespace App\Models;

use App\User;

class Discussion extends Model
{
    protected $fillable = [
      'title', 'content', 'slug', 'channel_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
