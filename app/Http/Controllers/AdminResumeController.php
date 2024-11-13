<?php

namespace App\Http\Controllers;

use App\Models\Resume;  // Assuming you have a Resume model for database interaction
use Illuminate\Http\Request;

class AdminResumeController extends Controller
{
    // Method to display filtered resumes
    public function index(Request $request)
    {
        // Filter resumes based on provided criteria (e.g., category or job position)
        $query = Resume::query();

        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->has('job_position')) {
            $query->where('job_position', 'like', '%' . $request->input('job_position') . '%');
        }

        $resumes = $query->get();

        $resumes = Resume::category($request->input('category'))
        ->jobPosition($request->input('job_position'))
        ->get();
        // Pass the filtered resumes to the view
        return view('admin.resumes.index', compact('resumes'));
    }
}
