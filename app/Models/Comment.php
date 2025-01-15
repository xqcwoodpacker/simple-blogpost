<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('Asia/Kolkata')->format('F j, Y g:i A');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('Asia/Kolkata')->format('F j, Y g:i A');
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::parse($value)->setTimezone('Asia/Kolkata')->setTimezone('UTC');
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = Carbon::parse($value)->setTimezone('Asia/Kolkata')->setTimezone('UTC');
    }
}
