<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <div class="text-lg font-bold mb-4">Summary</div>
    <button wire:click="algorithm"
        class="bg-indigo-600 text-white hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 font-bold py-2 px-4 rounded-md"
        type="button">Calculate</button>
    @if($status == 'success')
    <div class="flex justify-between mt-4">
        <div class="text-gray-600">Critical Path:</div>
        <div class="text-gray-800 font-bold">{{$criticalPath}}</div>
    </div>
    <div class="flex justify-between">
        <div class="text-gray-600">Shotest Time to Complete the project:</div>
        <div class="text-gray-800 font-bold">{{ $criticalTime }}</div>
    </div>
    @endif

</div>