<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use App\Models\ApplicationForm;
use App\Models\organization;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Retrieve all application forms
        $application = ApplicationForm::all();
        $totalApplication = $application->count(); // Count of application forms

        // Retrieve all job postings
        $jobs = JobPosting::all();
        $jobsTotal = $jobs->count(); // Count of job postings

        // Retrieve all organizations
        $departments = Organization::all();
        $totalDepartments = $departments->count(); // Count of organizations

        // Pass all necessary data to the view
        return view('admin.dashboard', compact(
            'application',
            'totalApplication',
            'jobs',
            'jobsTotal',
            'departments',
            'totalDepartments'
        ));
    }

}
