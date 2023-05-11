<x-app-layout>

    <style>
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: #007bff;
            border: 1px solid #007bff;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,
                background-color .15s ease-in-out,
                border-color .15s ease-in-out,
                box-shadow .15s ease-in-out;
        }

        .btn:hover {
            background-color: #0069d9;
            border-color: #0062cc;
            cursor: pointer;
        }

        body {
            overflow-y: scroll !important;
        }
    </style>
    <div class="overflow-y-auto">
        <link rel="stylesheet" href="/assets/css/card.css">
        <livewire:live-algorithm />
    </div>
</x-app-layout>