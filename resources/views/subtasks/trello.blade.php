<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            width: 470px !important;
            min-height: 500px;
        }

        .content {
            background-color: #e8e7e7;
            border-radius: 4px;
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
            padding: 12px;
            margin-bottom: 8px;
        }

        .content.dragging {
            opacity: 0.5;
        }
    </style>
    <div class="mt-4 ml-6 text-center">
        <a href="/{{auth()->user()->current_team_id}}/tasks"
            class=" bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md">Go
            Back</a>
        <a href="/{{auth()->user()->current_team_id}}/tasks/{{$task->id}}/subtasks/create"
            class="bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md"
            data-toggle="modal" data-target="#myModal">Add Task</a>

    </div>

    <div class="flex flex-row gap-4 ml-6 mt-4">
        <div class="card to-do bg-white rounded-lg shadow-md px-4 py-4" ondragover="allowDrop(event)"
            ondrop="drop(event)">
            <div class=" font-semibold text-lg mb-2">To Do</div>
            <div class="text-gray-600">Posted 2 days ago</div>
            <div class="content draggable" draggable="true" ondragstart="drag(event)">Content goes here for more length
            </div>
            <div class="content draggable" draggable="true" ondragstart="drag(event)">Content goes here</div>
            <div class="content draggable" draggable="true" ondragstart="drag(event)">Content goes here</div>
        </div>
        <div class="card doing bg-white rounded-lg shadow-md px-4 py-4" ondragover="allowDrop(event)"
            ondrop="drop(event)">
            <div class="font-semibold text-lg mb-2 ">Doing</div>
            <div class="text-gray-600">Posted 1 day ago</div>
        </div>
        <div class="card done bg-white rounded-lg shadow-md px-4 py-4" ondragover="allowDrop(event)"
            ondrop="drop(event)">
            <div class="font-semibold text-lg mb-2 ">Done</div>
            <div class="text-gray-600">Posted 3 days ago</div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Task</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="end-date">Deadline:</label>
                            <input type="date" class="form-control" id="end-date" name="end-date">
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Members
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form class="px-4 py-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="member1" id="member1">
                                        <label class="form-check-label" for="member1">
                                            Member 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="member2" id="member2">
                                        <label class="form-check-label" for="member2">
                                            Member 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="member3" id="member3">
                                        <label class="form-check-label" for="member3">
                                            Member 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="member4" id="member4">
                                        <label class="form-check-label" for="member4">
                                            Member 4
                                        </label>
                                    </div>
                                </form>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" type="button">Add Selected Members</button>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="members">Add Member:</label>
                            <select class="form-control" id="members" multiple>
                                <option>Member 1</option>
                                <option>Member 2</option>
                                <option>Member 3</option>
                                <option>Member 4</option>
                                <option>Member 5</option>
                            </select>
                        </div> --}}
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>

            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var dragging;

    function drag(event) {
        dragging = event.target;
        event.dataTransfer.setData("text", event.target.innerHTML);
        event.target.classList.add("dragging");
    }

    function allowDrop(event) {
        event.preventDefault();
    }

    function drop(event) {
        event.preventDefault();
        if (event.target.classList.contains("card")) {
            event.target.appendChild(dragging);
        }
        dragging.classList.remove("dragging");
    }
    </script>
</x-app-layout>