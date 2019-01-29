<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use RecordsActivity;

    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['project'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'completed' => 'boolean'
    ];

    /*
     * Get the model events that should trigger activity recording.
     *
     * @var array
     */
    protected static $modelEventsToRecord = ['created', 'deleted'];

    /**
     * Mark the task as complete.
     */
    public function complete()
    {
        $this->update(['completed' => true]);

        $this->project->recordActivity('completed_task');
    }

    /**
     * Mark the task as incomplete.
     */
    public function incomplete()
    {
        $this->update(['completed' => false]);
    }

    /**
     * Get the owning project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the path to the task.
     *
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }

    /**
     * Get the subject for the activity recording.
     *
     * @return $this
     */
    protected function activitySubject()
    {
        return $this->project;
    }
}
