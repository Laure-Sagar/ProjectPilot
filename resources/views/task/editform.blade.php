<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="container mt-2 mb-2">

        <a href="/{{ auth()->user()->current_team_id }}/tasks" class="btn btn-primary">Back to Tasks</a>
        <h2 class="text-center">Task Form</h2>
        <form action="/{{ auth()->user()->current_team_id }}/tasks/{{$task->id}}/edit" method="POST">
            @csrf
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <div class="form-group">
                <label for="task-name">Task Name:</label>
                <input type="text" class="form-control" id="task_name" name="task_name" value="{{ $task->name }}">
                @if ($errors->has('task_name'))
                <span class="text-danger">
                    @error('task_name')
                    {{ $message }}
                    @enderror
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="task-description">Task Description:</label>
                <textarea class="form-control" id="task_description" name="task_description" value=""
                    rows="3">{{ $task->description }}</textarea>
                @if ($errors->has('task_description'))
                <span class="text-danger">
                    @error('task_description')
                    {{ $message }}
                    @enderror
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="start-date">Duration (days)</label>
                <input type="number" class="form-control" id="start_date" name="duration" value="{{ $task->duration }}">
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
                @forelse($tasks as $taskd)
                @if($taskd->id != $task->id)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="task_dependencies[]" id="{{ $taskd->id }}"
                        value="{{ $taskd->id }}" @if(in_array($taskd->id, json_decode($task->dependencies))) checked
                    @endif>
                    <label class="form-check-label" for="{{ $taskd->id }}">
                        {{ $taskd->name }}
                    </label>
                </div>
                @endif
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