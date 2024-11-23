<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class organization extends Model
{
    // 
    protected $table = 'organization';

    protected $fillable = [
        'organization_name',
        'location',
        'description',
        'headcount',
        'job_status',
        'job_stage',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'headcount' => 'integer',
        'job_status' => 'string',
        'job_stage' => 'string',
    ];
}
