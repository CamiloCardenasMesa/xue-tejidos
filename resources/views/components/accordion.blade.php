@props(['title', 'borderClass'])

<div x-data="{ open: false }" @click="open = !open"
    class="flex flex-col w-full {{ $borderClass }} border-black/30 cursor-pointer">
    <div class="flex justify-between items-center">
        <div class="flex gap-2 py-4">
            {{ $icon }}
            <h3>{{ $title }}</h3>
        </div>
        <template x-if="open">
            @include('icons.minus-icon')
        </template>
        <template x-if="!open">
            @include('icons.plus-icon')
        </template>
    </div>
    <div :style="open ? 'max-height: 500px;' : 'max-height: 0;'"
        class="px-4 overflow-y-scroll no-scrollbar transition-max-height duration-500">
        <div class="pb-5 pl-4">
            {{ $content }}
        </div>
    </div>
</div>
