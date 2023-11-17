<div>
    <div class="grid grid-cols-6 border border-black">
        @foreach ($squares as $index => $square)
            <div wire:click="toggleColor({{ $index }})"
                class="cursor-pointer text-sm text-center text-gray-500 border border-gray-400 {{ $square['clicked'] ? 'bg-blue-500' : 'bg-gray-200' }}">
                {{ $index + 1 }}
            </div>
        @endforeach
    </div>
</div>
