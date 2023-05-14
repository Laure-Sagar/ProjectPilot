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
        <div class="card to-do bg-white rounded-lg shadow-md px-4 py-4" wire:sortable="SortTodo"
            wire:sortable-group="todo">
            <div class=" font-semibold text-lg mb-2">To Do</div>
            @foreach($subtasks->where('status','todo') as $subtask)
            <div class="content draggable" draggable="true" wire:key="subtask_{{ $subtask->id }}"
                wire:sortable.item="{{ $subtask->id }}">
                <div class="text-gray-600">{{ $subtask->date}}</div>{{$subtask->name}}
            </div>
            <button style="float:right; margin-top:-55px" wire:click="moveToDoing({{ $subtask->id }})">➡</button>
            @endforeach
        </div>
        <div class="card doing bg-white rounded-lg shadow-md px-4 py-4" wire:sortable="SortTodo"
            wire:sortable-group="doing">
            <div class="font-semibold text-lg mb-2 ">Doing</div>
            @foreach($subtasks->where('status','doing') as $subtask)
            <button class="mr-2" style="float:left; margin-top: 25px"
                wire:click="moveToDo({{ $subtask->id }})">⬅</button>
            <div class="content draggable" class="ml-6" draggable="true" wire:key="subtask_{{ $subtask->id }}"
                wire:sortable.item="{{ $subtask->id }}">
                <div class="text-gray-600">
                    {{ $subtask->date}}</div>
                {{$subtask->name}}
            </div>
            <button style="float:right; margin-top:-55px" wire:click="moveToDone({{ $subtask->id }})">➡</button>
            @endforeach
        </div>
        <div class="card done bg-white rounded-lg shadow-md px-4 py-4" ondragover="allowDrop(event)"
            ondrop="drop(event)" wire:sortable="SortTodo" wire:sortable-group="done">
            <div class="font-semibold text-lg mb-2 ">Done</div>
            @foreach($subtasks->where('status','done') as $subtask)
            <button class="mr-1" style="float:left; margin-top:25px"
                wire:click="moveToDoing({{ $subtask->id }})">⬅</button>
            <div class="content draggable" draggable="true" wire:key="subtask_{{ $subtask->id }}"
                wire:sortable.item="{{ $subtask->id }}">
                <div class="text-gray-600">{{$subtask->date}}</div>
                {{$subtask->name}}
            </div>
            @endforeach
        </div>
    </div>

    @if($button == "open")
    <form class="form bg-white rounded-lg shadow-lg ml-4 mr-4 mt-4 pt-4 px-6 pl-4">
        <div class=" mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Name:
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description" name="taskname" placeholder="Enter description" wire:model="taskname"
                required></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="description">
                Description:
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description" name="description" placeholder="Enter description" wire:model="description"
                required></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="end-date">
                Deadline:
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="end-date" type="date" name="end-date" wire:model="date" required>
            <div class="text-red-500">{{$errors->first('date')}}</div>
        </div>
        <div class="mb-4">
            <div class="dropdown mt-1 mb-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Members
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($teams as $member)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="members[]" value="{{$member->name}}"
                            id="member1" wire:model="members">
                        <label class="form-check-label" for="member1">
                            {{$member->name}}
                        </label>
                    </div>
                    @endforeach
                    <div class="dropdown-divider"></div>
                </div>
            </div>
            <button
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline"
                type="button" wire:click='close'>
                Close
            </button>
            <button wire:click='save'
                class="float-right bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md"
                type="button">
                Submit
            </button>
        </div>
    </form>
    @endif
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
</div>