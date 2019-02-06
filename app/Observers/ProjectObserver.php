<?php

namespace App\Observers;

use App\Project;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param  \App\Project $project
     * @return void
     */
    public function created(Project $project)
    {
        $project->recordActivity('created');
    }

    /**
     * Handle the project "updating" event.
     *
     * @param  \App\Project $project
     * @return void
     */
    public function updating(Project $project)
    {
        $project->old = $project->getOriginal();
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project $project
     * @return void
     */
    public function updated(Project $project)
    {
        $project->recordActivity('updated');
    }
}
