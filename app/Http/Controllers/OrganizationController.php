<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\JobPosting;

class OrganizationController extends Controller
{
    //

    public function index()
    {
        // Fetch all organizations with their related job postings count
        $departments = Organization::withCount('jobPostings')->get();

        // Total number of organizations
        $totalDepartments = $departments->count();

        return view('admin.organization.index', compact('departments', 'totalDepartments'));
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'organization_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        Organization::create($validatedData);

        if ($validatedData) {
            session()->flash('success', 'Organization Created Successfully');
            return redirect()->route('organization.index');
        } else {
            session()->flash('error', 'A problem occurred');
            return redirect()->route('organization.index');
        }
    }


    public function view($id, Request $request)
    {
        // Fetch the organization by its ID or fail if it doesn't exist
        $organization = Organization::findOrFail($id);

        // Get the active tab from the query parameter, defaulting to 'jobs'
        $activeTab = $request->query('tab', 'jobs');

        // Fetch job postings related to the organization (using the foreign key relationship)
        $jobPostings = JobPosting::where('organization_id', $id)->get();

        // Return the view with the relevant data
        return view('admin.organization.view', [
            'organization' => $organization,
            'activeTab' => $activeTab,
            'jobPostings' => $jobPostings,
        ]);
    }


    public function nav($id, Request $request)
    {
        $organization = Organization::findOrFail($id);
        // Get the tab from the query parameter, defaulting to 'jobs'
        $activeTab = $request->query('tab', 'jobs');

        return view('admin.organization.edit', [
            'organization' => $organization,
            'activeTab' => $activeTab,
        ]);
    }


    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        return view('admin.organization.edit', compact('organization'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'organization_name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'headcount' => 'nullable|integer|min:0',
            'job_status' => 'required|in:Open,Closed',
            'job_stage' => 'required|in:Application,Interview,Offer,Hired,Rejected',
        ]);

        $organization = Organization::findOrFail($id);
        $organization->update(array_merge($validatedData, ['updated_by' => auth()->user()->name]));

        return redirect()->route('organization.index')->with('success', 'Organization updated successfully.');
    }

    public function delete($id)
    {
        $table = Organization::findOrFail($id)->delete();
        if ($table) {
            session()->flash('success', 'Organization Deleted Successfully');
            return redirect()->route('organization.index');
        } else {
            session()->flash('error', 'A problem occurred');
            return redirect()->route('organization.index');
        }

    }



}
