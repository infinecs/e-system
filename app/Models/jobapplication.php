<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'jobapplication';

    protected $primaryKey = 'ApplicationID';
    public $timestamps = false;

    protected $fillable = [
        'ApplicationID',
        'JobType',
        'FirstName',
        'LastName',
        'Nationality',
        'ContactNo',
        'Email',
        'UniversityInstitute',
        'FieldOfStudy',
        'Qualification',
        'QualificationGrade',
        'InternshipPeriod',
        'YearsOfExperience',
        'JobSpecialization',
        'NoticePeriod',
        'PositionApplied',
        'CurrentPosition',
        'CurrentCompany',
        'CurrentSalaryUnit',
        'CurrentSalary',
        'ExpectedSalary',
        'UploadResume',
        'Status',
        'DateCreate',
        'Flag',
        'ResidenceStatus',
        'InMY',
        'EPStatus',
        'NoticePeriodNegotiable',
    ];
}
