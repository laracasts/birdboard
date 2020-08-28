<div class="card bg-white mb-3">
    <div class="card-body">
        <div class="card-title">
            <h3>
                <a href="{{ $project->path() }}" class="text-reset">{{ $project->title }}</a>
            </h3>
        </div>
        <p class="card-text">{{ str_limit($project->description, 100) }}</p>
        @can ('manage', $project)
            <footer>
                <form method="POST" action="{{ $project->path() }}" class="text-right">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </footer>
        @endcan
    </div>
</div>