<?php

namespace Tests\Setup;

use App\Project;
use App\Task;
use App\User;

class ProjectFactory
{
    /**
     * The number of tasks for the project.
     *
     * @var int
     */
    protected $tasksCount = 0;

    /**
     * The owner of the project.
     *
     * @var User
     */
    protected $user;

    /**
     * Set the number of tasks to create for the project.
     *
     * @param  int $count
     * @return $this
     */
    public function withTasks($count)
    {
        $this->tasksCount = $count;

        return $this;
    }

    /**
     * Set the owner of the new project.
     *
     * @param  User $user
     * @return $this
     */
    public function ownedBy($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Arrange the world.
     *
     * @return Project
     */
    public function create()
    {
        $project = factory(Project::class)->create([
            'owner_id' => $this->user ?? factory(User::class)
        ]);

        factory(Task::class, $this->tasksCount)->create([
            'project_id' => $project
        ]);

        return $project;
    }
}

