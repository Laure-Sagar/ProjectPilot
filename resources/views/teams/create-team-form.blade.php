<x-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('Project Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new project to collaborate with others on projects.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-label value="{{ __('Project Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full object-cover" src="{{ $this->user->profile_photo_url }}"
                    alt="{{ $this->user->name }}">

                <div class="ml-4 leading-tight">
                    <div class="text-gray-900">{{ $this->user->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $this->user->email }}</div>
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Project Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
            <textarea wire:model="description" name="description" id="description"
                class="form-textarea rounded-md shadow-sm mt-1 block w-full"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label for="start_date" class="block font-medium text-sm text-gray-700">Start Date</label>
            <input type="date" wire:model="start_date" name="start_date" id="start_date"
                class="form-input rounded-md shadow-sm mt-1 block w-full" />
            @error('start_date') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label for="end_date" class="block font-medium text-sm text-gray-700">End Date</label>
            <input type="date" wire:model="end_date" name="end_date" id="end_date"
                class="form-input rounded-md shadow-sm mt-1 block w-full" />
            @error('end_date') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-4">
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
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Create') }}
        </x-button>
    </x-slot>
</x-form-section>