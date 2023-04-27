

<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="container">
    {{-- <form action="{{ route('projects.update', $project->id) }}" method="POST"> --}}
        <form>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value={{$project->start_date->format('d/M/Y')}}>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>

{{-- value="{{ $project->start_date }} --}}