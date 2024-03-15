<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequirement extends Model
{
    protected $table = "jobrequirements";
    protected $fillable = [
        'job_id',
        'content',
    ];

    public function jobDetail()
    {
        return $this->belongsTo(JobDetail::class, 'job_id');
    }
}
