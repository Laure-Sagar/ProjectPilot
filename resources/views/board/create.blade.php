<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full md:w-1/2 lg:w-1/3 px-8">
            <form method="POST" action="{{ route('boards.store') }}" class="space-y-6">
                @csrf
                <div class="col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <div class="mt-1">
                        <textarea name="description" id="description" rows="3"
                            class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6">
                    <label for="earliest_start_date" class="block text-sm font-medium text-gray-700">Earliest Start
                        Date</label>
                    <div class="mt-1">
                        <input type="date" name="earliest_start_date" id="earliest_start_date"
                            value="{{ old('earliest_start_date') }}"
                            class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('earliest_start_date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6">
                    <label for="earliest_finish_date" class="block text-sm font-medium text-gray-700">Earliest Finish
                        Date</label>
                    <div class="mt-1">
                        <input type="date" name="earliest_finish_date" id="earliest_finish_date"
                            value="{{ old('earliest_finish_date') }}"
                            class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('earliest_finish_date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6">
                    <label for="latest_start_date" class="block text-sm font-medium text-gray-700">Latest Start
                        Date</label>
                    <div class="mt-1">
                        <input type="date" name="latest_start_date" id="latest_start_date"
                            value="{{ old('latest_start_date') }}"
                            class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('latest_start_date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6">
                    <label for="latest_finish_date" class="block text-sm font-medium text-gray-700">Latest Start
                        Date</label>
                    <div class="mt-1">
                        <input type="date" name="latest_finish_date" id="latest_finish_date"
                            value="{{ old('latest_finish_date') }}"
                            class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('latest_finish_date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="dependencies_board">
                        Dependencies Boards
                    </label>
                    <select
                        class="form-multiselect block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="dependencies_board[]" multiple>
                        <option value="" disabled>Select dependencies...</option>
                        <option value="board1">Board 1</option>
                        <option value="board2">Board 2</option>
                        <option value="board3">Board 3</option>
                        <option value="board4">Board 4</option>
                        {{-- @foreach ($boards as $board)
                        <option value="{{ $board->id }}">{{ $board->name }}</option>
                        @endforeach --}}
                    </select>
                </div>

                <div class="col-span-6">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-1">
                        <select name="status" id="status"
                            class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="progress" {{ old('status')=='progress' ? 'selected' : '' }}>In Progress
                            </option>
                            <option value="complete" {{ old('status')=='complete' ? 'selected' : '' }}>Complete</option>
                            <option value="incomplete" {{ old('status')=='incomplete' ? 'selected' : '' }}>Incomplete
                            </option>
                        </select>
                    </div>
                    @error('status')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </form>
        </div>
    </div>
</x-app-layout>