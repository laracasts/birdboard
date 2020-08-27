<?php

namespace App\Http\Controllers;

use App\Project;

class StartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->accessibleProjects();
        return view('dashboard.homepage', compact('projects'));
    }
}
