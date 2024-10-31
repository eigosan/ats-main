<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;

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
        $sample = auth()->user()->id;
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'job_position' => 'required|string|max:255',
            'additional_info' => 'nullable|string',

        ]);

        $validatedData['user_id'] = $sample;

        ApplicationForm::create($validatedData);

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
        $application = ApplicationForm::findOrFail($id);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $job_position = $request->job_position;
        $additional_info = $request->additional_info;

        $application->first_name = $first_name;
        $application->last_name = $last_name;
        $application->email = $email;
        $application->phone_number = $phone_number;
        $application->job_position = $job_position;
        $application->additional_info = $additional_info;
        $validatedData = $application->save();
        if ($validatedData) {
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
