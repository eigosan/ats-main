<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    protected $table = 'application_forms';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'age',
        'education_level',
        'other_education',
        'graduation_year',
        'institution',
        'company_name',
        'position',
        'start_date',
        'end_date',
        'job_description',
        'skills',
        'resume',
        'user_id',
        'status',
    ];
}
