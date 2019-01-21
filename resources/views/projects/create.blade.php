@extends ('layouts.app')

@section('content')
    <form
        method="POST"
        action="/projects"
        class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow"
    >
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">
            Let’s start something new
        </h1>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="title">Title</label>

            <div class="control">
                <input
                    type="text"
                    class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                    name="title"
                    placeholder="My next awesome project">
            </div>
        </div>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="description">Description</label>

            <div class="control">
                <textarea
                    name="description"
                    rows="10"
                    class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                    placeholder="I should start learning piano."></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link mr-2">Create Project</button>

                <a href="/projects">Cancel</a>
            </div>
        </div>
    </form>
@endsection
