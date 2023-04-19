<x-app-layout>
    <link rel="stylesheet" href="/assets/css/card.css">

    <header>
    <div class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Task List</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Example task card -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Task ID: <span class="text-gray-600">1</span></h2>
                    <span class="text-sm text-gray-600">Duration: <span class="font-bold">5 days</span></span>
                </div>
                <div class="mb-4">
                    <h3 class="text-gray-600 font-bold mb-2">Task Name</h3>
                    <p class="text-gray-800">Task 1 Name</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-gray-600 font-bold mb-2">Task Description</h3>
                    <p class="text-gray-800">This is a description of Task 1.</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-gray-600 font-bold mb-2">Dependencies</h3>
                    <ul class="list-disc list-inside">
                        <li>Dependency 1</li>
                        <li>Dependency 2</li>
                    </ul>
                </div>
            </div>
            <!-- Repeat task card for each task -->
            <!-- Example task card -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Task ID: <span class="text-gray-600">2</span></h2>
                    <span class="text-sm text-gray-600">Duration: <span class="font-bold">3 days</span></span>
                </div>
                <div class="mb-4">
                    <h3 class="text-gray-600 font-bold mb-2">Task Name</h3>
                    <p class="text-gray-800">Task 2 Name</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-gray-600 font-bold mb-2">Task Description</h3>
                    <p class="text-gray-800">This is a description of Task 2.</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-gray-600 font-bold mb-2">Dependencies</h3>
                    <ul class="list-disc list-inside">
                        <li>Dependency 3</li>
                    </ul>
                </div>
            </div>
            <!-- Repeat task card for each task -->
        </div>
</div>
  </header>
</x-app-layout>