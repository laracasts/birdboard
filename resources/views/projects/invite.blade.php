<div class="card bg-white mb-3">
    <div class="card-body">
        <div class="card-title">
            <h3 class="mb-3">Invite a User</h3>
        </div>
        <form method="POST" action="{{ $project->path() . '/invitations' }}" class="text-right">
            @csrf
    
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email address">
            </div>
    
            <button type="submit" class="btn btn-primary">Invite</button>
        </form>
    
        @include ('errors', ['bag' => 'invitations'])
    </div>
</div>
