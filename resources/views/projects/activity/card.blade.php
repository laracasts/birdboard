<div class="card bg-white mb-3">
    <div class="card-body">
        <ul class="list-group list-group-flush" >
            @foreach ($project->activity as $activity)
                <li class="list-group-item small {{ $loop->last ? '' : 'pb-2' }}">
                    @include ("projects.activity.{$activity->description}")
                    <span class="text-muted">{{ $activity->created_at->diffForHumans(null, true) }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

