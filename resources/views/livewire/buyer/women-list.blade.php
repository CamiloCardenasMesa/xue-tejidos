<div>
    <div class="flex gap-1 justify-center items-center w-full bg-white">
        <div class="flex items-center p-3 lg:p-6 gap-3">
            <x-input class="flex-1" type="text" wire:model="search"
                placeholder="{{ trans('products.placeholders.search') }}" />
        </div>
    </div>
    @if ($products->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-1 bg-white">
            @foreach ($products as $product)
                <div class="flex flex-col justify-between">
                    <div class="cursor-pointer hover:brightness-90 transition ease-in-out duration-200"
                        style="height: 660px;">
                        <a href="{{ route('product.show', $product) }}">
                            @if ($product->images)
                                <img class="object-cover w-full h-full"
                                    src="{{ asset('storage/' . $product->images[0]) }}"
                                    alt="{{ 'image of ' . $product->name }}" />
                            @else
                                <img class="object-cover w-full h-full"
                                    src="{{ asset('storage/images/product_image.png') }}" alt="">
                            @endif
                        </a>
                    </div>
                    <section class="mb-10 mt-2">
                        <div class="flex flex-col items-center justify-center">
                            <h1 class="font-medium">{{ $product->name }}</h1>
                            <p>$ {{ $product->price }}</p>
                        </div>
                        <div class="flex items-center mt-2 justify-center gap-1">
                            @foreach ( $product->colors as $color )
                                <div class="w-3 h-3" style="background-color:  {{ $color->hex_code }} ">
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex text-2xl items-center justify-center px-3 pb-6">
            {{ trans('products.failed_search') }}
        </div>
    @endif
</div>
