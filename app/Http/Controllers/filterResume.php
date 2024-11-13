<?php

namespace App\Http\Controllers;

use App\Models\Resume; // Assuming you have a Resume model for interacting with the database
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use League\Csv\Writer;
use League\Csv\Reader;
use SplTempFileObject;

class filterResume extends Controller
{
    public function index()
    {
        $filteredResults = session('filteredResults', collect());

        return view('admin.resume.index', compact('filteredResults'));
    }

    public function filter()
    {
        return view('admin.resume.filter');
    }

    public function filterResults(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
        ]);

        $jobTitle = $request->input('job_title');

        // Query to find job titles containing the keyword
        $filteredResults = JobPosting::where('job_title', 'ILIKE', '%' . $jobTitle . '%')->get();

        // Redirect to index with filtered results
        return redirect()->route('resume.index')->with('filteredResults', $filteredResults);
    }

    // // Store data into a CSV file and process NLP
    // public function store(Request $request)
    // {
    //     // Validate and retrieve form data
    //     $validated = $request->validate([
    //         'first_name' => 'required|string',
    //         'last_name' => 'required|string',
    //         'email' => 'required|email',
    //         'phone_number' => 'required|string',
    //         'job_position' => 'required|string',
    //         'resume_text' => 'required|string',
    //     ]);

    //     // Extract resume text from the form (if available)
    //     $resumeText = $validated['resume_text'];

    //     // Process NLP on the resume text (For example, extract keywords, job classification, etc.)
    //     $nlpResult = $this->processWithNLP($resumeText);

    //     // Prepare the data to be saved in CSV
    //     $data = [
    //         'first_name' => $validated['first_name'],
    //         'last_name' => $validated['last_name'],
    //         'email' => $validated['email'],
    //         'phone_number' => $validated['phone_number'],
    //         'job_position' => $validated['job_position'],
    //         'resume_text' => $resumeText,
    //         'nlp_result' => $nlpResult, // Result of NLP processing (e.g., classification)
    //         'created_at' => now(),
    //     ];

    //     // Store data in CSV file
    //     $this->storeInCSV($data);

    //     return redirect()->route('resume.index')->with('success', 'Resume Submitted and Processed.');
    // }

    // // Process NLP (e.g., classify resume or extract keywords)
    // public function processWithNLP($resumeText)
    // {
    //     // NLP Logic (e.g., using Python or any NLP library to process resume)
    //     // For now, we'll simulate NLP by returning a string, but you can replace it with actual NLP code
    //     return 'Category: Software Developer'; // Example NLP output
    // }

    // // Store form data and NLP result in CSV
    // public function storeInCSV($data)
    // {
    //     $csvFile = storage_path('app/public/resumes.csv');

    //     // Check if the file exists, if not, create the header row
    //     if (!File::exists($csvFile)) {
    //         $header = ['first_name', 'last_name', 'email', 'phone_number', 'job_position', 'resume_text', 'nlp_result', 'created_at'];
    //         $this->writeToCSV($csvFile, $header); // Create header row
    //     }

    //     // Append the new form data and NLP result
    //     $this->writeToCSV($csvFile, $data);
    // }

    // // Helper function to write data to CSV
    // private function writeToCSV($csvFile, $data)
    // {
    //     $csv = Writer::createFromPath($csvFile, 'a'); // Open the CSV file in append mode
    //     $csv->insertOne($data); // Insert a new row with the form data
    // }

    // // Display filtered resumes (admin view)
    // // public function filter(Request $request)
    // // {
    // //     // Get filter criteria from the form
    // //     $job_position = $request->input('job_position');
    // //     $nlp_result = $request->input('nlp_result');

    // //     // Filter the CSV data based on the criteria
    // //     $filteredResumes = $this->filterCSV($job_position, $nlp_result);

    // //     return view('resume.index', compact('filteredResumes'));
    // // }

    // // Helper function to filter CSV based on given criteria
    // private function filterCSV($job_position, $nlp_result)
    // {
    //     $csvFile = storage_path('app/public/resumes.csv');
    //     $filteredData = [];

    //     // Read the CSV file and filter rows based on criteria
    //     if (File::exists($csvFile)) {
    //         // Open the CSV file for reading
    //         $csv = Reader::createFromPath($csvFile, 'r');
    //         $csv->setHeaderOffset(0); // Set the first row as the header

    //         // Get records as an associative array where the keys are the column headers
    //         $records = $csv->getRecords();

    //         // Loop through the records and apply filters
    //         foreach ($records as $row) {
    //             // Filter based on job position and NLP result
    //             if (
    //                 ($job_position && strpos($row['job_position'], $job_position) !== false) ||
    //                 ($nlp_result && strpos($row['nlp_result'], $nlp_result) !== false)
    //             ) {
    //                 $filteredData[] = $row;
    //             }
    //         }
    //     }

    //     return $filteredData;
    // }

    // public function showFilterForm()
    // {
    //     return view('resume.filter');  // Make sure you have a 'filter.blade.php' file
    // }
}
