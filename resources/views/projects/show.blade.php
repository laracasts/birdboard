@extends ('dashboard.app')

@section('content')
    <header class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="col-8">
            <h1>
                {{ $project->title }}
            </h1>
        </div>
        <div class="col-4 text-right">
            @foreach ($project->members as $member)
            <img
                src="{{ gravatar_url($member->email) }}"
                alt="{{ $member->name }}'s avatar"
                class="rounded-circle h-50">
            @endforeach

            <img
                src="{{ gravatar_url($project->owner->email) }}"
                alt="{{ $project->owner->name }}'s avatar"
                class="rounded-circle h-10 mr-4">

            <a href="{{ $project->path().'/edit' }}" class="btn btn-primary">Edit Project</a>
        </div>
    </header>

    <main>
        <div class="row mx-2">
            <div class="col-8">
                <div class="mb-8">

                    {{-- tasks --}}
                    @foreach ($project->tasks as $task)
                        <hr>
                        <div class="alert alert-light mb-0">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-0 bg-white" >
                                            <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input name="body" value="{{ $task->body }}" class="form-control border-0" style="{{ $task->completed ? 'text-decoration: line-through; color: #c7c7c7' : '' }}">
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="alert alert-light">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf

                            <input placeholder="Add a new task..." class="form-control" name="body">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-4">
                @include ('projects.card')
                @include('projects.notes')
                @include ('projects.activity.card')                

                @can ('manage', $project)
                    @include ('projects.invite')
                @endcan
            </div>
        </div>
    </main>
@endsection
