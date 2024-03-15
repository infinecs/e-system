<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    protected $table = "job_details";
    protected $fillable = [
        'job_reference',
        'position_name',
        'position_id',
        'remote',
        'office_address',
        'headcount',
        'experience_level',
        'expected_close_date',
        'min_salary',
        'max_salary',
        'currency',
        'frequency',
        'contract_details',
    ];

    public function jobRequirements()
    {
        return $this->hasMany(JobRequirement::class);
    }

    public function jobDescriptions()
    {
        return $this->hasMany(JobDescription::class);
    }
}
