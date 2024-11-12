<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class filterResume extends Controller
{

    public function showForm()
    {
        return view('resume.filter');
    }

    // Handle resume filtering and display results
    public function filterResume(Request $request)
    {
        // Get the resume text from the form input
        $resumeText = $request->input('resume_text');

        // Send the resume text to the Python microservice
        $response = Http::post('http://127.0.0.1:5000/filter', [
            'resume_text' => $resumeText,
        ]);

        // Get the matching resumes from the response
        $matches = $response->json('matches');

        // Return the matches to the view
        return view('resume.matches', ['matches' => $matches]);
    }
}
