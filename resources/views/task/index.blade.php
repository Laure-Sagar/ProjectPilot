<x-app-layout>
    <style>
        body {
            overflow-y: scroll !important;
        }
    </style>
    <div class="overflow-y-auto">
        <link rel="stylesheet" href="/assets/css/card.css">

        <header>
            <div class="bg-gray-100">
                <div class="container mx-auto py-8">
                    <!-- Repeat task card for each task -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <div class="text-lg font-bold mb-4">Summary</div>
                        <div class="flex justify-between">
                            <div class="text-gray-600">Critical Path:</div>
                            <div class="text-gray-800 font-bold">{{implode(" ---> ", $criticalPath)}}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="text-gray-600">Shotest Time to Complete the project:</div>
                            <div class="text-gray-800 font-bold">{{$criticalTime}}</div>
                        </div>
                    </div>
                    <h1 class="text-2xl font-bold mb-4">{{$tasks_data->first()->project->name}}</h1>
                    <a href="/{{auth()->user()->current_team_id}}/tasks/create"
                        class="float-right bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md">Add
                        Task</a>
                    <div class=" mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <!-- Example task card -->
                        @foreach ($tasks_data as $task)
                        <a href="/{{$task->id}}/subtasks">
                            <div class="bg-white rounded-lg shadow-md py-4 px-4">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-sm text-gray-600"><i>Duration:</i> <span
                                            class="font-bold">{{$task->duration}} days</span></span>
                                </div>
                                <div class="mb-4">
                                    <h3 class="text-gray-600 font-bold mb-2"><i>Task Name</i></h3>
                                    <p class="text-gray-800">{{$task->name}}</p>
                                </div>
                                <div class="mb-4">
                                    <h3 class="text-gray-600 font-bold mb-2"><i>Task Description</i></h3>
                                    <p class="text-gray-800">{{$task->description}}</p>
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
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
        </header>
    </div>
</x-app-layout>