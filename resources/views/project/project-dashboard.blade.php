<x-app-layout>
    <div class="container">
        <div class="row justify-center">
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
                                    <td class="border px-4 py-2">{{$project->name}}</td>
                                    <td class="border px-4 py-2">{{$project->description}}</td>
                                    <td class="border px-4 py-2">{{$project->start_date}}</td>
                                    <td class="border px-4 py-2">{{$project->end_date}}</td>
                                    <td class="border px-4 py-2">{{$project->status}}</td>
                                    <td class="border px-4 py-2">
                                        <a href="/{{$project->id}}/board"> <button type="button"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Boards</button></a>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                        </form>
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