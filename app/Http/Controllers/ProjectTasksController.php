<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectTasksController extends Controller
{
    /**
     * Add a task to the given project.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project $project)
    {
        request()->validate(['body' => 'required']);

        $project->addTask(request('body'));

        return redirect($project->path());
    }
}
