<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;

class ApplicantList extends Controller
{
    public function index($id)
    {

        $application = ApplicationForm::where('user_id', $id)->get();
        return view('admin.dashboard.view', compact('application'));

    }

}
