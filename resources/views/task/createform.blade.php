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
            </div>
            <div class="form-group">
                <label for="task-description">Task Description:</label>
                <textarea class="form-control" id="task_description" name="task_description"
                    value="{{ old('task_description') }}" rows="3"></textarea>
                @if ($errors->has('task_description'))
                <span class="text-danger">
                    @error('task_description')
                    {{ $message }}
                    @enderror
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="start-date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date"
                    value="{{ old('start_date') }}">
                @if ($errors->has('start_date'))
                <span class="text-danger">
                    @error('start_date')
                    {{ $message }}
                    @enderror
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="end-date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                @if ($errors->has('end_date'))
                <span class=" text-danger">
                    @error('end_date')
                    {{ $message }}
                    @enderror
                </span>
                @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="task-duration-days">Duration (days):</label>
                    <input type="text" class="form-control" id="task_days" name="task_days" min="0" disabled>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(function() {
                            $('#end_date').on('change', function() {
                                var start_date = new Date($('#start_date').val());
                                var end_date = new Date($('#end_date').val());
                                var diff = Math.floor((end_date - start_date) / (1000 * 60 * 60 * 24));
                                if (diff > 0) {
                                    $('#task_days').val(diff);
                                } else {

                                    $('#task_days').val('Duration in negative value');
                                }
                            });
                        });
                    </script>
                </div>
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