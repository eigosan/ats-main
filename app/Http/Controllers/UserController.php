<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    { {
            $jobs = JobPosting::all();// retirve all application forms
            $jobsTotal = $jobs->count();

            return view('user.dashboard', compact('jobs', 'jobsTotal'));
        }
    }
}

