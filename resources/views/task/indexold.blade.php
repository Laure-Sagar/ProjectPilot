<x-app-layout>
    <!-- Board Details -->
    @foreach ($boards as $board)
    <a href="/board/{{$board->id}}">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <!-- Board Name and Description -->
            <div class="flex flex-row justify-between items-center mb-4">
                <div class="flex flex-col">
                    <h2 class="font-bold text-xl mb-2">{{ $board->name }}</h2>
                    <p class="text-gray-700 text-base">{{ $board->description }}</p>
                </div>
                <a href="{{ route('boards.edit', $board->id) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
            </div>

            <!-- Board Schedule and Status -->
            <div class="flex flex-row justify-between items-center mb-4">
                <div class="flex flex-col">
                    <p class="font-bold text-base mb-2">Schedule</p>
                    <p class="text-gray-700 text-base"><strong>Start:</strong> {{ $board->earliest_start_date }}</p>
                    <p class="text-gray-700 text-base"><strong>Finish:</strong> {{ $board->earliest_finish_date }}</p>
                </div>
                <div class="flex flex-col">
                    <p class="font-bold text-base mb-2">Status</p>
                    <p class="text-gray-700 text-base">{{ $board->status }}</p>
                </div>
            </div>

            <!-- Board Task Details -->
            {{-- <div class="flex flex-col">
                <p class="font-bold text-base mb-2">Tasks</p>
                @foreach ($board->tasks as $task)
                <div class="flex flex-row justify-between items-center mb-2">
                    <div class="flex flex-col">
                        <p class="text-gray-700 text-base">{{ $task->description }}</p>
                        <p class="text-gray-500 text-sm"><strong>Duration:</strong> {{ $task->task_duration }} days</p>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-gray-700 text-base"><strong>Start:</strong> {{ $task->earliest_start_date }}</p>
                        <p class="text-gray-700 text-base"><strong>Finish:</strong> {{ $task->earliest_finish_date }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div> --}}
        </div>
    </a>
    @endforeach
</x-app-layout>