<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="container mt-2 mb-2">

        <a href="/{{ auth()->user()->current_team_id }}/tasks" class="btn btn-primary">Back to Tasks</a>
        <h2 class="text-center">Task Form</h2>
        <form action="/{{ auth()->user()->current_team_id }}/tasks/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="task-name">Task Name:</label>
                <input type="text" class="form-control" id="task_name" name="task_name" value="{{ old('task_name') }}">
                @if ($errors->has('task_name'))
                <span class="text-danger">
                    @error('task_name')
                    {{ $message }}
                    @enderror
                </span>
                @endif
                @if (session('error_task'))
                <span class="text-danger">
                    {{ session('error_task') }}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="task-description">Task Description:</label>
                <textarea class="form-control" id="task_description" name="task_description"
                    rows="3">{{ old('task_description') }}</textarea>
                @if ($errors->has('task_description'))
                <span class="text-danger">
                    @error('task_description')
                    {{ $message }}
                    @enderror
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="task-duration-days">Duration (days):</label>
                <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}">
                @if ($errors->has('duration'))
                <span class="text-danger">
                    @error('duration')
                    {{ $message }}
                    @enderror
                </span>
                @endif
            </div>
            <div class="form-group">
                <label>Dependencies Task:</label>
                @forelse($tasks as $task)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="task_dependencies[]" id="{{ $task->id }}"
                        value="{{ $task->id }}">
                    <label class="form-check-label" for="{{ $task->id }}">
                        {{ $task->name }}
                    </label>
                </div>
                @empty
                <p style="text-align: center;">No tasks available</p>
                @endforelse
            </div>
            <div class="button">
                <input type="submit" value="Save" class="btn btn-primary float-right">
            </div>
            </from>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>