@props([
    'imageA' => '',
    'imageB' => '',
    'title' => '',
])

<div {{ $attributes->merge(['class' => 'relative w-full h-full']) }}>
    <img src="{{ asset($imageA) }}" alt="Imagen 1"
        class="absolute h-full w-full object-cover transition duration-300 opacity-100 hover:opacity-0">
    <img src="{{ asset($imageB) }}" alt="Imagen 2"
        class="absolute h-full w-full object-cover transition duration-300 opacity-0 hover:opacity-100">
    <div class="absolute bottom-0 mb-3 lg:mb-6 bg-black/40 w-full">
        <h1 class="text-white text-justify pl-4 py-1 lg:pl-8 lg:py-2 text-2xl lg:text-4xl font-normal">
            {{ $title }}
        </h1>
    </div>
</div>
