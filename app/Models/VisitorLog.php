<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    public $timestamps=false;
    protected $table='visitor_logs';

    protected $guarded=[];
}
