<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    //
    protected $table = 'job_postings';

    protected $fillable = [
        'job_title',
        'company',
        'address',
        'job_description',
        'job_category',
        'job_type',
    ];

}
