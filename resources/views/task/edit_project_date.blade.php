<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="container">
        <form action="{{ route('project.updatedates', $project->id) }}" method="PUT">
            @csrf
            <h1 class="text-lg font-bold mt-4 mb-4">Edit Dates</h1>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date"
                    value="{{\Carbon\Carbon::parse($project->start_date)->format('Y-d-m') }}">
            </div>
            <div class="form-group">
                <label for="start_date">End Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date"
                    value="{{\Carbon\Carbon::parse($project->end_date)->format('Y-d-m') }}">
            </div>
            <button type=" submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>

{{-- value="{{ $project->start_date }} --}}