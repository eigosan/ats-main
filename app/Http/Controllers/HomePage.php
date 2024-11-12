<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    //
    public function about()
    {
        return view('homepage.partials.about');
    }

    public function listing()
    { {
            $jobs = JobPosting::all();// retirve all application forms
            $jobsTotal = $jobs->count();

            return view('homepage.partials.listing', compact('jobs', 'jobsTotal'));
        }
    }
}