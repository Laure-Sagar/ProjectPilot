<div>
    <style>
        .form {
            position: absolute;
            top: 0;
            left: 0;
            margin-top: 6%;
            margin-left: 10%;
            width: 80%;
            height: 80%;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.5);
        }

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

        a {
            cursor: pointer;
        }
    </style>
    <div class="mt-4 ml-6 text-center">
        <a href="/{{auth()->user()->current_team_id}}/tasks"
            class=" bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md">Go
            Back</a>
        <a class="bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md"
            wire:click='open'>Add Task</a>

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

    @if($button == "open")
    <form class="form bg-white rounded-lg shadow-lg ml-4 mr-4 mt-4 pt-4 px-6 pl-4">
        <div class=" mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Name:
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="name" type="text" placeholder="Enter name">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="description">
                Description:
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description" placeholder="Enter description"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="end-date">
                Deadline:
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="end-date" type="date" name="end-date">
        </div>
        <div class="mb-4">
            <div class="dropdown">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <button
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline"
                type="button" wire:click='close'>
                Close
            </button>
            {{-- submit button --}}
            <button
                class="float-right bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md"
                type="button">
                Submit
            </button>
        </div>
        {{-- close button --}}
    </form>
    @endif
</div>