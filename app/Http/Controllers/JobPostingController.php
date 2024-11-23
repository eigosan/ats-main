<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\JobPosting;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::all();
        $totalJobs = $jobs->count();
        return view('admin.job.index', compact('jobs', 'totalJobs'));

    }

    public function create()
    {
        return view('admin.job.create');
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
        $jobs = JobPosting::find($id);
        return view('admin.job.view', compact('jobs'));
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

}
