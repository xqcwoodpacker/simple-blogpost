<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    public $timestamps = false;
    protected $table = 'user_logs';
    protected $fillable = ['user_id', 'action'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getTimestampAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y g:i A');  
    }
    public function setTimestampAttribute($value)
    {
        $this->attributes['timestamp'] = Carbon::parse($value)->setTimezone('Asia/Kolkata')->setTimezone('UTC');
    }
}
