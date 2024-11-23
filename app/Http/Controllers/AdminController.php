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
        $application = ApplicationForm::all(); // Retrieve all application forms
        $totalApplication = $application->count();

        $jobs = JobPosting::all();// retirve all application forms
        $jobsTotal = $jobs->count();

        $departments = Organization::all();
        $totalDepartments = $departments->count();

        return view('admin.dashboard', compact('application', 'totalApplication', 'jobs', 'jobsTotal', 'departments', 'totalDepartments'));
    }
}
