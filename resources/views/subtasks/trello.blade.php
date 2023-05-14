<x-app-layout>
    @livewireStyles
    <livewire:subtask-popup :task_id='$task_id' />
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
</x-app-layout>