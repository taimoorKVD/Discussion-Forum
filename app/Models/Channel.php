<?php

namespace App\Models;

class Channel extends Model
{
    public function discussions()
    {
        return $this->hasMany(Discussion::class,'channel_id');
    }
}
