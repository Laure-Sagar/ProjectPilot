<header>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <!-- Repeat task card for each task -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="text-lg font-bold mb-4">Summary
                    <div wire:loading.remove wire:target="algorithm">
                        <button wire:click="algorithm"
                            class="bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md"
                            type="button">Calculate </button>
                    </div>
                    <div wire:loading wire:target="algorithm">
                        <button
                            class="bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md"
                            type="button" disabled>Calculating </button>
                    </div>
                    @if($status == 'success')
                    <div wire:loading.remove wire:target="algorithm">
                        <div class="flex justify-between mt-4">
                            <div class="text-gray-600">Critical Path:</div>
                            <div class="text-gray-800 font-bold">{{$criticalPath}}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="text-gray-600">Shotest Time to Complete the project:</div>
                            <div class="text-gray-800 font-bold">{{ $criticalTime }}</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('task.create', ['project_id' => $project_id]) }}"
                    class="float-right bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md">Add
                    Task</a>
                <a href="{{ route('project.edit_start_date', $project_id) }}"
                    class="float-right bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md">Edit
                    Project Date</a>

            </div>
            @if ($tasks_data->first() != null)
            <h1 class="text-2xl font-bold mb-4">Project: {{ $tasks_data->first()->project->name }}</h1>
            <div class=" mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($tasks_data as $task)
                <div class="bg-white rounded-lg shadow-md py-4 px-4">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-gray-600"><i>Duration:</i> <span class="font-bold">{{
                                $task->duration }} days</span></span>
                        <div
                            class="float-right bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md">
                            <a href="{{ route('task.edit', ['project_id' => $project_id, 'task_id' => $task->id]) }}">
                                <button>Edit</button>
                            </a>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-gray-600 font-bold mb-2"><i>Task Name</i></h3>
                        <a href="/{{ $task->id }}/subtasks" class="underline">
                            <p class="text-blue-800">{{ $task->name }}</p>
                        </a>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-gray-600 font-bold mb-2"><i>Task Description</i></h3>
                        <p class="text-gray-800">{{ $task->description }}</p>
                    </div>
                    <div wire:loading.remove wire:target="algorithm">
                        <div class="mb-4">
                            <p class="text-gray-800">
                                @php
                                // use carbon to convert to date
                                $date1 =
                                \Carbon\Carbon::parse($task->project->start_date)->addDays($task->est)->format('d-m-Y');
                                $date2 =
                                \Carbon\Carbon::parse($task->project->start_date)->addDays($task->lft)->format('d-m-Y');
                                $date3 =
                                \Carbon\Carbon::parse($task->project->start_date)->addDays($task->est)->format('d-m-Y');
                                $date4 =
                                \Carbon\Carbon::parse($task->project->start_date)->addDays($task->lst)->format('d-m-Y');
                                // show slack time in days
                                @endphp
                                Earliest Start Date= {{$date1}}<br>
                                Latest Finish Date= {{ $date2 }}<br>
                                Earliest Finish Date= {{$date3}}<br>
                                Latest Start Date= {{ $date4}}<br>
                            </p>
                        </div>
                    </div>
                    <div wire:loading wire:target="algorithm">
                        <div class="mb-4">
                            <p class="text-gray-800">Calculating...</p>
                        </div>
                    </div>

                    <div wire:loading.remove wire:target="algorithm">
                        <div class="mb-4">
                            <p class="text-gray-800">
                                Slack Time= {{ $task->slack}} days <br>
                            </p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-gray-600 font-bold mb-2"><i>Dependencies</i></h3>
                        <ul class="list-disc list-inside">
                            @forelse(json_decode($task->dependencies) as $dep)
                            <li>@php echo App\Models\Task::find($dep)->name; @endphp</li>
                            @empty
                            <li>No dependencies</li>
                            @endforelse
                        </ul>

                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-gray-600"><i>Duration:</i> <span class="font-bold">{{
                                $task->duration }} days</span></span>
                        <div
                            class="float-right bg-red-600 text-white hover:bg-indigo-50 focus:outline-none focus:bg-indigo-50 font-bold py-2 px-4 rounded-md">
                            <a
                                href="{{ route('task.destroy', ['project_id' => $project_id, 'task_id' => $task->id]) }}">
                                <button>Delete</button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <h1>No Tasks</h1>
            @endif
        </div>
</header>