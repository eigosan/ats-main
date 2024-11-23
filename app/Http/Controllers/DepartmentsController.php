<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    //

    public function index()
    {
        $departments = Departments::all();
        $totalDepartments = $departments->count();
        return view('admin.department.index', compact('departments', 'totalDepartments'));
    }

    public function create()
    {
        return view('admin.department.create');
    }

}
