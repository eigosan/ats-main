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
        'job_position',
        'additional_info',
        'user_id',
    ];

}
