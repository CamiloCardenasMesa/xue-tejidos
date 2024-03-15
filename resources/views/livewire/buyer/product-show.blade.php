<div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 bg-white">
        <figure class="col-span-2 overflow-y-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-1">
                @if ($product->images)
                    @foreach ($product->images as $image)
                        <img class="object-cover w-full h-full" src="{{ asset('storage/' . $image) }}" alt="">
                    @endforeach
                @else
                    <img class="object-cover w-full h-full" src="{{ asset('storage/images/product_image.png') }}"
                        alt="">
                @endif
            </div>
        </figure>
        <section class="sticky top-20 h-screen">
            <div class="h-full m-6 lg:m-12">
                <header class="flex mb-6 justify-between">
                    <h1 class="font-regular text-xl lg:text-2xl w-1/2">{{ $product->name }}</h1>
                    <h2 class="font-medium text-lg lg:text-xl">$ {{ $product->price }}</h2>
                </header>
                <main>
                    <div class="mb-6 lg:mb-10">
                        <h4 class="mb-1">Colores disponibles:</h4>
                        <div class="flex justify-start gap-2">
                            @foreach ($product->colors as $color)
                                <div x-data="{ showTooltip: false }" @mouseover="showTooltip = true"
                                    @mouseleave="showTooltip = false" class="relative">
                                    <div class="h-6 w-6 rounded-full border border-black/30 cursor-pointer"
                                        style="background-color: {{ $color->hex_code }}"></div>
                                    <div x-show="showTooltip"
                                        class="absolute top-full mt-1 left-1/2 transform -translate-x-1/2 bg-white text-xs lg:text-sm text-black px-2 py-1 border border-black/30 rounded-md text-center">
                                        {{ $color->name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 lg:gap-2">
                        <h1>Descripción</h1>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="flex flex-col mt-6 lg:mt-12">
                        <a class="underline underline-offset-4 cursor-pointer">Guía de tallas</a>
                        <div class="flex mt-1 lg:mt-2 w-full">
                            <x-select>
                                <option selected>TALLA</option>
                                <option value="xs">XS</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                            </x-select>
                            <x-button-link class="border-l-0">
                                Personalizar
                            </x-button-link>
                        </div>
                    </div>
                    <div class="flex mt-1 lg:mt-2 gap-1 lg:gap-2">
                        <x-button class="w-full items-center justify-center">
                            Añadir al carrito
                        </x-button>
                        <x-button>
                            @include('icons.heart-icon')
                        </x-button>
                    </div>
                </main>
                <footer>
                    <section class="grid grid-rows-4 mt-6 lg:mt-12">
                        <div class="flex gap-2 py-4 w-full border-y border-y-1 border-black/30">
                            @include('icons.leaf-icon')
                            Materiales y composición
                        </div>
                        <div class="flex gap-2 py-4 w-full border-b border-b-1 border-black/30">
                            @include('icons.wash-icon')
                            Cuidados
                        </div>
                        <div class="flex gap-2 py-4 w-full border-b border-y-1 border-black/30">
                            @include('icons.send-icon')
                            Envíos y devoluciones
                        </div>
                        <div class="flex gap-2 py-4 w-full border-b border-y-1 border-black/30">
                            @include('icons.timer-icon')
                            Tiempos de entrega
                        </div>
                        <div class="flex gap-2 py-4 w-full">
                            @include('icons.store-icon')
                            Disponibilidad en tienda física
                        </div>
                        <div class="flex gap-2 py-4 w-full border-y border-y-1 border-black/30">
                            @include('icons.question-icon')
                            Preguntas frecuentes
                        </div>
                    </section>
                </footer>
            </div>
        </section>
    </div>
    <section>
        <h4>También te puede gustar</h4>
        {{-- <div class="grid grid-cols-1 lg:grid-cols-4 gap-1 bg-white">
            @foreach ($products as $product)
                <div class="border border-black/30">
                    <div class="cursor-pointer hover:brightness-90 transition ease-in-out duration-200" style="height: 660px;">
                        <a href="{{ route('product.show', $product) }}">
                            <img class="object-cover w-full h-full" 
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ 'image of ' . $product->name }}" />
                        </a>
                    </div>
                    <div class="relative grid grid-cols-4">
                        <div class="col-span-3 px-3 pt-3 pb-6">
                            <h1 class="font-medium">{{ $product->name }}</h1>
                            <p>$ {{ $product->price }}</p>
                        </div>
                        <div
                            class="border-l border-black/30 hover:bg-black hover:text-white transition ease-in-out duration-300 ">
                            <a class="flex items-center justify-center h-full w-full" href="#">Personalizar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}
    </section>
</div>
