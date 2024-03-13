<div>
    <div class="flex gap-1 justify-center items-center w-full bg-white">
        <div class="flex items-center p-3 lg:p-6 gap-3">
            <x-input class="flex-1" type="text" wire:model="search"
                placeholder="{{ trans('products.placeholders.search') }}" />
        </div>
    </div>
    @if ($products->count())
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-1 bg-white">
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
                            {{-- @include('icons.cart-icon') --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex text-2xl items-center justify-center px-3 pb-6">
            {{ trans('products.failed_search') }}
        </div>
    @endif
</div>
