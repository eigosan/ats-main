<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;
    public function Organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
    //
    protected $table = 'job_postings';

    protected $fillable = [
        'job_title',
        'company',
        'address',
        'job_description',
        'job_category',
        'job_type',
        'organization_id',
    ];

}
