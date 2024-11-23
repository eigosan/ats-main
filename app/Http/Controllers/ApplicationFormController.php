<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationFormController extends Controller
{
    //
    public function index()
    {
        $userId = auth()->user()->id;
        $application = ApplicationForm::where('user_id', $userId)->get();
        return view('user.upload.index', compact('application'));

    }

    public function create()
    {
        return view('user.upload.create');
    }

    public function store(Request $request)
    {
        // Get the authenticated user's ID
        $userId = auth()->user()->id;

        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'job_position' => 'required|string|max:255',
            'education_level' => 'required|string|max:255',
            'other_education' => 'nullable|string|max:255',
            'graduation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'institution' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'job_description' => 'nullable|string',
            'skills' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,docx|max:5120', // 5MB max
        ]);

        $validatedData['user_id'] = $userId;


        // Handle file upload for the resume
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public'); // Save in the 'resumes' directory under 'storage/app/public'
            $validatedData['resume'] = $resumePath;
        }


        // Create a new application record
        ApplicationForm::create($validatedData);

        // Check if creation was successful and set the session message
        if ($validatedData) {
            session()->flash('success', 'Application Created Successfully');
            return redirect()->route('upload.index');
        } else {
            session()->flash('error', 'A problem occurred');
            return redirect()->route('upload.index');
        }
    }

    public function edit($id)
    {
        $application = ApplicationForm::findOrFail($id);
        return view('user.upload.edit', compact('application'));
    }

    public function update(Request $request, $id)
{
    // Find the application record or fail if not found
    $application = ApplicationForm::findOrFail($id);

    // Validate the incoming request data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone_number' => 'required|string|max:15',
        'job_position' => 'required|string|max:255',
        'education_level' => 'required|string|max:255',
        'other_education' => 'nullable|string|max:255',
        'graduation_year' => 'required|integer|min:1900|max:' . date('Y'),
        'institution' => 'required|string|max:255',
        'company_name' => 'nullable|string|max:255',
        'position' => 'nullable|string|max:255',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'job_description' => 'nullable|string',
        'skills' => 'nullable|string',
        'resume' => 'nullable|file|mimes:pdf,docx|max:5120', // Optional, max 5MB
    ]);

    // Handle file upload for the resume (if provided)
    if ($request->hasFile('resume')) {
        // Delete the old resume file if it exists
        if ($application->resume) {
            \Storage::disk('public')->delete($application->resume);
        }

        // Save the new file
        $resumePath = $request->file('resume')->store('resumes', 'public');
        $validatedData['resume'] = $resumePath;
    } elseif (!$request->hasFile('resume') && $application->resume) {
        // Keep the existing resume if no new file is uploaded
        $validatedData['resume'] = $application->resume;
    }

    // Update the application record with validated data
    $application->update($validatedData);

    // Check if the update was successful and set the session message
    if ($application) {
        session()->flash('success', 'Application Updated Successfully');
        return redirect()->route('upload.index');
    } else {
        session()->flash('error', 'A problem occurred');
        return redirect()->route('upload.index');
    }
}

    public function delete($id)
    {
        $application = ApplicationForm::findOrFail($id)->delete();
        if ($application) {
            session()->flash('success', 'Application Deleted Successfully');
            return redirect()->route('upload.index');
        } else {
            session()->flash('error', 'A problem occurred');
            return redirect()->route('upload.index');
        }

    }


}
