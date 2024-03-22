<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenPositions extends Model


{
    protected $table = 'open_positions';
    protected $fillable = ['position_name', 'job_description','pdf_file','id','status','created_at' ];
}

