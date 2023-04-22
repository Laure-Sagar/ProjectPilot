<x-app-layout>
    <link rel="stylesheet" href="/assets/css/card.css">

    <header>
        <div class="header-flex">
            <a href="/{{auth()->user()->current_team_id}}/tasks"
                class="float-right bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md">Go
                Back</a>
            <h1 id="title" class="text-align-center pt-2">{{$task}}</h1>
            <span id="sidebar-button"><i class="fa fa-list"></i></span>
            <span class="title-actions-container" style="display:none"
                style="font-size:25px;cursor:pointer;letter-spacing: 1ch;">
                <label for="auto-save" class="auto-save-text">Auto Save</label>
                <label class="switch" id="auto-save-label">
                    <input id="auto-save" type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
                <i title="Delete this board." id="delete-button" class="fa fa-trash"></i>
                <i title="Save all boards." id="save-button" class="fa fa-floppy-o"></i>
                <i title="Settings" id="settings-button" class="fa fa-gear"></i>
            </span>
        </div>
    </header>


    <div id="sidebar" class="sidenav" style="display:none">
        <span id="sidebar-close">&times;</span>
        <p class="is-title">Boards</p>
        <ul id="boards-list">
            <!-- Boards will be listed here... -->
        </ul>

        <div class="flex-col">
            <input type="text" id="add-board-text" name="add-board" placeholder="Add Board...">
            <button id="add-board-button">Add Board</button>
        </div>
    </div>

    <div id="card-context-menu" class="context-menu">
        <!-- Right-click context menu on cards. -->
        <ul>
            <li id="card-context-menu-delete">Delete</li>
            <li id="card-context-menu-clear">Clear</li>
            <li id="card-context-menu-duplicate">Duplicate</li>
        </ul>
    </div>

    <div class="container" id="main-container">
        <div id="cards-container">
            <div id="add-card">
                <input maxlength="128" type="text" id="add-card-text" name="add-card" placeholder="Add Card..."
                    autofocus>
                <button id="add-card-button" class="plus-button">+</button>
            </div>
        </div>
    </div>

    <div id="alert-container">
        <div id="alerts">
            <!-- alerts go here -->
        </div>
    </div>

    <div id="confirm-dialog" class="modal">
        <div class="dialog-content">
            <span id="confirm-dialog-close" class="confirm-dialog-close">&times;</span>
            <div id="confirm-dialog-text" class="confirm-dialog-text"></div>
            <div class="confirm-dialog-actions">
                <button id="confirm-dialog-cancel" class="confirm-dialog-cancel"> Cancel </button>
                <button id="confirm-dialog-confirm" class="confirm-dialog-confirm"> Confirm </button>
            </div>
        </div>
    </div>

    <script src="/assets/js/main.js"></script>
</x-app-layout>