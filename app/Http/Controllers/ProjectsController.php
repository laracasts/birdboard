<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectsController extends Controller
{
    /**
     * View all projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    /**
     * Show a single project.
     *
     * @param Project $project
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    /**
     * Create a new project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Persist a new project.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3'
        ]);

        $project = auth()->user()->projects()->create($attributes);

        return redirect($project->path());
    }

    /**
     * Update the project.
     *
     * @param  Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $project->update(request(['notes']));

        return redirect($project->path());
    }
}
