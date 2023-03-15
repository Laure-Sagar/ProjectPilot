<x-app-layout>
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h2 class="text-lg font-medium text-gray-900">{{ $board->name }}</h2>
            <p class="text-gray-500 text-sm">{{ $board->description }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="bg-gray-100 rounded-md shadow-sm p-4">
                <h3 class="text-sm font-medium text-gray-500">Earliest Start Date</h3>
                <p class="text-lg font-semibold">{{ $board->earliest_start_date }}</p>
            </div>
            <div class="bg-gray-100 rounded-md shadow-sm p-4">
                <h3 class="text-sm font-medium text-gray-500">Earliest Finish Date</h3>
                <p class="text-lg font-semibold">{{ $board->earliest_finish_date }}</p>
            </div>
            <div class="bg-gray-100 rounded-md shadow-sm p-4">
                <h3 class="text-sm font-medium text-gray-500">Latest Start Date</h3>
                <p class="text-lg font-semibold">{{ $board->latest_start_date }}</p>
            </div>
            <div class="bg-gray-100 rounded-md shadow-sm p-4">
                <h3 class="text-sm font-medium text-gray-500">Latest Finish Date</h3>
                <p class="text-lg font-semibold">{{ $board->latest_finish_date }}</p>
            </div>
            <div class="bg-gray-100 rounded-md shadow-sm p-4">
                <h3 class="text-sm font-medium text-gray-500">Task Duration</h3>
                <p class="text-lg font-semibold">{{ $board->task_duration }} days</p>
            </div>
            <div class="bg-gray-100 rounded-md shadow-sm p-4">
                <h3 class="text-sm font-medium text-gray-500">Dependencies Board</h3>
                <p class="text-lg font-semibold">{{ $board->dependencies_board }}</p>
            </div>
            <div class="bg-gray-100 rounded-md shadow-sm p-4">
                <h3 class="text-sm font-medium text-gray-500">Status</h3>
                <p class="text-lg font-semibold">{{ $board->status }}</p>
            </div>
            <div class="bg-gray-100 rounded-md shadow-sm p-4">
                <h3 class="text-sm font-medium text-gray-500">Project ID</h3>
                <p class="text-lg font-semibold">{{ $board->project_id }}</p>
            </div>
        </div>
    </div>
</x-app-layout>