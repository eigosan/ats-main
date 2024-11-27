<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\JobPosting;
use App\Models\organization;
use App\Models\ApplicationForm;

class JobPostingController extends Controller
{
    public function index()
    {
        // Fetch all job postings with the related organization
        $jobs = JobPosting::with('organization')->get();

        // Get the total count of job postings
        $totalJobs = $jobs->count();

        // Fetch all organizations if needed (optional)
        $organizations = Organization::all();

        // Pass jobs, totalJobs, and organizations to the view
        return view('admin.job.index', compact('jobs', 'totalJobs', 'organizations'));
    }


    public function create($id)
    {
        // Fetch the specific organization by its ID
        $organization = Organization::findOrFail($id);

        // Pass the organization to the view, so it can be used in the form
        return view('admin.job.create', compact('organization'));
    }



    public function store(Request $request)
    {
        Log::info($request->all());
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'job_description' => 'string',
            'job_category' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'organization_id' => 'required|exists:organization,id',
        ]);

        JobPosting::create($validatedData);

        if ($validatedData) {
            session()->flash('success', 'Job Listing Created Successfully');
            return redirect()->route('jobs.index');
        } else {
            session()->flash('error', 'A problem occurred');
            return redirect()->route('jobs.index');
        }

    }

    public function view($id)
    {
        $jobs = JobPosting::findOrFail($id);
        $applicants = ApplicationForm::all(); // Fetch all applicants
        return view('admin.job.view', compact('applicants', 'jobs'));
    }

    public function edit($id)
    {
        $jobs = JobPosting::findOrFail($id);
        return view('admin.job.edit', compact('jobs'));
    }

    public function update(Request $request, $id)
    {
        $table = JobPosting::findOrFail($id);

        $job_title = $request->job_title;
        $company = $request->company;
        $address = $request->address;
        $job_description = $request->job_description;
        $job_category = $request->job_category;
        $job_type = $request->job_type;

        $table->job_title = $job_title;
        $table->company = $company;
        $table->address = $address;
        $table->job_description = $job_description;
        $table->job_category = $job_category;
        $table->job_type = $job_type;
        $validatedData = $table->save();
        if ($validatedData) {
            session()->flash('success', 'Job Listing Updated Successfully');
            return redirect()->route('jobs.view', $table->id);
        } else {
            session()->flash('error', 'A problem occurred');
            return redirect()->route('jobs.view', $table->id);
        }
    }

    public function delete($id)
    {
        $table = JobPosting::findOrFail($id)->delete();
        if ($table) {
            session()->flash('success', 'Job Listing Deleted Successfully');
            return redirect()->route('jobs.index');
        } else {
            session()->flash('error', 'A problem occurred');
            return redirect()->route('jobs.index');
        }

    }


    public function updateStatus(Request $request, $id)
    {
        $applicant = ApplicationForm::findOrFail($id);
        $applicant->update(['status' => $request->status]);

        return response()->json(['message' => 'Status updated successfully']);
    }
    public function updateJobStatus(Request $request, $id)
    {

        // Find the job by ID
        $job = JobPosting::findOrFail($id);

        // Update the job status
        $job->status = $request->status;
        $job->save();  // Save the updated job status to the database

        // Return a JSON response to confirm the update
        return response()->json(['message' => 'Job status updated successfully']);
    }



}
