<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsentForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'employmentSecurityDepartment',
        'socialSecurityAdministration',
        'departmentOfCorrections',
        'childSupportEnforcement',
        'healthCareProviders',
        'mentalHealthProviders',
        'chemicalDependencyProviders',
        'housingProgramProviders',
        'departmentOfSocialHealthServices',
        'collegesAndEducationProviders',
        'attachedLists',
        'others',
        'mentalHealthAC',
        'hivStdAC',
        'attachedListsAC',
        'signed',
        'date',
    ];

    protected $attributes = [
        'employmentSecurityDepartment' => null,
        'socialSecurityAdministration' => null,
        'departmentOfCorrections' => null,
        'childSupportEnforcement' => null,
        'healthCareProviders' => null,
        'mentalHealthProviders' => null,
        'chemicalDependencyProviders' => null,
        'housingProgramProviders' => null,
        'departmentOfSocialHealthServices' => null,
        'collegesAndEducationProviders' => null,
        'attachedLists' => null,
        'others' => null,
        'mentalHealthAC' => null,
        'hivStdAC' => null,
        'attachedListsAC' => null,
        'signed' => null,
        'date' => null,
    ];
}
