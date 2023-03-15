<x-app-layout>
    <div class="flex flex-row space-x-4 overflow-x-auto bg-gray-100 p-2">
        @foreach ($boards as $list)
        <div class="bg-gray-200 rounded-md px-2 py-1 max-w-xs" style="min-width: 250px;">
            <div class="flex flex-row items-center justify-between">
                <h2 class="text-lg font-bold">{{ $list->name }}</h2>
                <a href="#" class="text-gray-600 hover:text-gray-800"><i class="fas fa-ellipsis-h"></i></a>
            </div>
            <hr class="my-1">
            <ul class="list-none">
                @foreach ($list->cards as $card)
                <li class="bg-white rounded-md px-2 py-1 mb-2 cursor-pointer">
                    <div class="flex flex-row items-center justify-between">
                        <h3 class="text-base font-medium">{{ $card->title }}</h3>
                        <a href="#" class="text-gray-600 hover:text-gray-800"><i class="fas fa-ellipsis-h"></i></a>
                    </div>
                    <div class="flex flex-row items-center space-x-1">
                        <span class="text-gray-600 text-sm">{{ $card->due_date }}</span>
                        <div class="flex flex-row items-center space-x-1">
                            <span class="bg-green-500 rounded-full w-3 h-3"></span>
                            <span class="text-sm">{{ $card->status }}</span>
                        </div>
                    </div>
                </li>
                @endforeach
                <li class="bg-white rounded-md px-2 py-1 cursor-pointer">
                    <div class="flex flex-row items-center">
                        <i class="fas fa-plus mr-2"></i>
                        <span class="text-sm font-medium">Add a card</span>
                    </div>
                </li>
            </ul>
        </div>
        @endforeach
    </div>
</x-app-layout>