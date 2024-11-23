<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    //

    protected $table = 'departments';

    protected $fillable = [
        'department_name',
        'position_name',
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
