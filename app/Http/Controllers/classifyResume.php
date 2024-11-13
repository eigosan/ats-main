<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class classifyResume extends Controller
{
    public function classify(Request $request)
    {
        $client = new Client();

        // Extract the resume text from the request
        $resumeText = $request->input('resume_text');

        try {
            // Call the Flask API to classify the resume
            $response = $client->post('http://127.0.0.1:5000/predict', [
                'json' => ['resume_text' => $resumeText],
            ]);

            // Get the prediction response from Flask API
            $data = json_decode($response->getBody()->getContents(), true);

            // Return the classification result to the user
            return view('resume.result', ['result' => $data]);
        } catch (\Exception $e) {
            // Handle errors, such as API being down
            return response()->json(['error' => 'Prediction failed. Please try again later.'], 500);
        }
    }
}
