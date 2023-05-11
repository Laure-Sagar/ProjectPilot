<x-app-layout>
    <livewire:subtask-popup />
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