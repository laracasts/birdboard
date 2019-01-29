<?php

namespace Tests\Unit;

use App\Project;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_belongs_to_a_project()
    {
        $task = factory(Task::class)->create();

        $this->assertInstanceOf(Project::class, $task->project);
    }

    /** @test */
    function it_has_a_path()
    {
        $task = factory(Task::class)->create();

        $this->assertEquals("/projects/{$task->project->id}/tasks/{$task->id}", $task->path());
    }

    /** @test */
    function it_can_be_completed()
    {
        $task = factory(Task::class)->create();

        $this->assertFalse($task->completed);

        $task->complete();

        $this->assertTrue($task->fresh()->completed);
    }

    /** @test */
    function it_can_be_marked_as_incomplete()
    {
        $task = factory(Task::class)->create(['completed' => true]);

        $this->assertTrue($task->completed);

        $task->incomplete();

        $this->assertFalse($task->fresh()->completed);
    }
}
