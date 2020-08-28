<div class="card bg-white mb-3">
    <div class="card-body">
        <div class="card-title">
            <h3 class="mb-3">General Notes</h3>
        </div>
        {{-- general notes --}}
        <form method="POST" action="{{ $project->path() }}" class="text-right">
            @csrf
            @method('PATCH')

            <textarea
                name="notes"
                class="form-control mb-3"
                style="min-height: 200px"
                placeholder="Anything special that you want to make a note of?"
            >{{ $project->notes }}</textarea>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        @include ('errors')
    </div>
</div>