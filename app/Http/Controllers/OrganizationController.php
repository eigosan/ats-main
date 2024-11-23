<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    //

    public function index()
    {
        $departments = Organization::all();
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


}
