<x-app-layout>
    <h3 class="text-lg font-semibold text-gray-800">{{ __(' .') }}</h3>
    <div class="container px-4">
        <div class="row justify-center p-2">
            <div class="col-md-10">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Description</th>
                                    <th class="px-4 py-2">Start Date</th>
                                    <th class="px-4 py-2">End Date</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td class="border px-4 py-2">{{$project->id}}</td>
                                    <td class="border px-4 py-2 underline text-blue-800"><a
                                            href="/{{$project->id}}/tasks">{{$project->name}}</a></td>
                                    <td class="border px-4 py-2">{{$project->description}}</td>
                                    <td class="border px-4 py-2">{{$project->start_date}}</td>
                                    <td class="border px-4 py-2">{{$project->end_date}}</td>
                                    <td class="border px-4 py-2">{{$project->status}}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('project.edit', $project->id) }}"> <button type="button"
                                                class="bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-1 px-2 rounded">Settings</button>
                                        </a>
                                        <a href="{{ route('project.destroy', $project->id) }}"> <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>