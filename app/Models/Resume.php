<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    // Add a scope for filtering by category
    public function scopeCategory($query, $category)
    {
        if ($category) {
            return $query->where('category', $category);
        }
        return $query;
    }

    // Add a scope for filtering by job position
    public function scopeJobPosition($query, $jobPosition)
    {
        if ($jobPosition) {
            return $query->where('job_position', 'like', '%' . $jobPosition . '%');
        }
        return $query;
    }
}
