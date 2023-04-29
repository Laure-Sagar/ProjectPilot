<x-app-layout>
    <form class="w-full max-w-md bg-white rounded-lg shadow-lg ml-4 mr-4 mt-4 pt-4 pl-4">
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
        </div>
    </form>
</x-app-layout>