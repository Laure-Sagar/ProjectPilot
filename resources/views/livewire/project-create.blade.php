<div class="col-span-6">
    <form wire:submit.prevent="submitForm">
        <div class="col-span-6 sm:col-span-4 mt-4">
            <label for="name" class="block font-medium text-sm text-gray-700">Project Name</label>
            <input wire:model="name" id="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                autofocus />
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
            <textarea wire:model="description" name="description" id="description"
                class="form-textarea rounded-md shadow-sm mt-1 block w-full"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <label for="start_date" class="block font-medium text-sm text-gray-700">Start Date</label>
            <input type="date" wire:model="start_date" name="start_date" id="start_date"
                class="form-input rounded-md shadow-sm mt-1 block w-full" />
            @error('start_date') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <label for="end_date" class="block font-medium text-sm text-gray-700">End Date</label>
            <input type="date" wire:model="end_date" name="end_date" id="end_date"
                class="form-input rounded-md shadow-sm mt-1 block w-full" />
            @error('end_date') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
            <select wire:model="status" name="status" id="status"
                class="form-select rounded-md shadow-sm mt-1 block w-full">
                <option value="">Select a status</option>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            @error('status') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end mt-4">
            <button wire:click="store()" type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                Submit
            </button>
        </div>
    </form>
</div>