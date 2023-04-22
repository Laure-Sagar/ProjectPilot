<x-app-layout>
    <link rel="stylesheet" href="/assets/css/card.css">

    <header>
        <div class="bg-gray-100">
            <div class="container mx-auto py-8">
                <!-- Repeat task card for each task -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="text-lg font-bold mb-4">Summary</div>
                    <div class="flex justify-between">
                        <div class="text-gray-600">Critical Path:</div>
                        <div class="text-gray-800 font-bold">{{implode(" -> ", $criticalPath)}}</div>
                    </div>
                    <div class="flex justify-between">
                        <div class="text-gray-600">Shotest Time to Complete the project:</div>
                        <div class="text-gray-800 font-bold">{{$criticalTime}}</div>
                    </div>
                </div>
                <h1 class="text-2xl font-bold mb-4">Task List</h1>
                <a href="/task_form" class="bg-dark-500 hover:bg-blue-700 text-dark font-bold py-2 px-4 rounded-md">Add
                    Task</a>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Example task card -->
                    @foreach ($tasks_data as $task)
                    {{--
                    <?php dd($tasks) ?> --}}

                    <a href="/task/1/subtasks">
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-sm text-gray-600">Duration: <span
                                        class="font-bold">{{$task->task_duration}} days</span></span>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-gray-600 font-bold mb-2">Task Name</h3>
                                <p class="text-gray-800">{{$task->name}}</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-gray-600 font-bold mb-2">Task Description</h3>
                                <p class="text-gray-800">{{$task->description}}</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-gray-600 font-bold mb-2">Dependencies</h3>
                                <ul class="list-disc list-inside">
                                    @foreach(json_decode($task->dependencies) as $dep)
                                    <li>{{$dep}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </a>

                    @endforeach
                    <!-- Repeat task card for each task -->
                    <!-- Example task card -->

                </div>

            </div>
    </header>
</x-app-layout>