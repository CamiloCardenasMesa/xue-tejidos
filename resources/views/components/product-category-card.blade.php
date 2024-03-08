@props([
    'imageA' => '',
    'imageB' => '',
    'title' => '',
])

<div class="relative">
    <div title="{{ $title }}"
        class="bg-cover w-full h-full bg-[url('/public/storage/images/guest/{{ $imageA }}')] hover:bg-[url('/public/storage/images/guest/{{ $imageB }}')] hover:brightness-75 duration-500">
    </div>
    <div class="absolute bottom-0 mb-3 lg:mb-6 bg-black/40 w-full">
        <h1 class="text-white text-justify pl-4 py-1 lg:pl-8 lg:py-2 text-2xl lg:text-4xl font-normal">
            {{ $title }}
        </h1>
    </div>
</div>
