<div>
    <x-table>
        {{-- delete product message --}}
        @if ($errorMessage)
            <div class="bg-red-200 text-red-800 shadow-sm p-4 mb-4">
                {{ $errorMessage }}
            </div>
        @endif

        {{-- search bar --}}
        <div class="flex items-center p-3 lg:p-6 gap-3">
            <x-input class="flex-1" type="text" wire:model="search"
                placeholder="{{ trans('products.placeholders.search') }}" />
            <livewire:products.create-product />
        </div>

        {{-- table --}}
        @if ($products->count())
            <section class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 shadow-sm">
                    <thead>
                        <tr>
                            <th scope="col" class="px-7 pb-3 text-left text-xs font-medium text-gray-500 uppercase">
                                <div class="flex items-center justify-between">
                                    {{ trans('products.image') }}
                                </div>
                            </th>
                            <th wire:click="order('name')" scope="col"
                                class="w-1/3 px-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                                <div class="flex items-center justify-between">
                                    <div>
                                        {{ trans('products.name') . '-' . trans('products.description') }}
                                    </div>
                                    <x-sort-icon :field="'name'" :sort="$sort" :direction="$direction" />
                                </div>
                            </th>
                            <th scope="col" class="px-3 text-left text-xs font-medium text-gray-500 uppercase">
                                {{ trans('products.available_colors') }}
                            </th>
                            <th wire:click="order('price')" scope="col"
                                class="px-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                                <div class="flex items-center justify-between">
                                    <div>
                                        {{ trans('products.price') }}
                                    </div>
                                    <x-sort-icon :field="'price'" :sort="$sort" :direction="$direction" />
                                </div>
                            </th>
                            <th wire:click="order('stock')" scope="col"
                                class="px-3 text-left text-xs font-medium text-gray-500 cursor-pointer uppercase">
                                <div class="flex items-center justify-between">
                                    {{ trans('products.stock') }}
                                    <x-sort-icon :field="'stock'" :sort="$sort" :direction="$direction" />
                                </div>
                            </th>
                            <th scope="col" class="px-3 text-left text-xs font-medium text-gray-500 uppercase">
                                {{ trans('products.category') }}
                            </th>
                            <th scope="col" class="px-3 text-left text-xs font-medium text-gray-500 uppercase">
                                {{ trans('products.status') }}
                            </th>
                            <th scope="col" class="px-3 text-left text-xs font-medium text-gray-500 uppercase">
                                {{ trans('products.actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="even:bg-gray-100 odd:bg-white text-gray-700">
                                <td class="py-2 lg:py-4 pl-3 md:p-3 lg:px-6">
                                    @if ($product->images)
                                        <img class="w-16 h-16 rounded-full object-cover"
                                            src="{{ asset('storage/' . $product->images[0]) }}"
                                            alt="{{ 'image of ' . $product->name }}">
                                    @else
                                        <img class="w-16 h-16 rounded-full object-cover"
                                            src="{{ asset('storage/images/product_image.png') }}" alt="">
                                    @endif
                                </td>
                                <td class="p-3 font-bold">
                                    <div>
                                        {{ $product->name }}
                                    </div>
                                    <div class="text-xs text-gray-600 font-light">
                                        {{ $product->description }}
                                    </div>
                                </td>
                                <td class="p-3">
                                    @foreach ($product->colors as $color )
                                    <div class="flex items-center gap-1 text-xs">
                                        <div class="w-3 h-3 rounded-full" style="background-color: {{ $color->hex_code }}">
                                        </div>
                                        <p>{{ $color->name }}</p>

                                    </div>
                                    @endforeach
                                </td>
                                <td class="px-3 font-bold">
                                    ${{ $product->price }}
                                </td>
                                <td class="px-3">
                                    {{ $product->stock }}
                                </td>

                                <td class="px-3 py-2">
                                    {{ trans('categories.' . $product->category->name) }}
                                </td>

                                <td class="px-3 py-2">
                                    @if ($product->status)
                                        <span
                                            class="text-green-500 p-2 rounded-lg">{{ trans('products.enabled') }}</span>
                                    @else
                                        <span
                                            class="text-red-700 p-2 rounded-lg">{{ trans('products.disabled') }}</span>
                                    @endif
                                </td>
                                <td class="p-3 lg:pr-6">
                                    <section class="flex items-center">
                                        @livewire('products.edit-product', ['product' => $product], key($product->id))
                                        <x-button-action action="delete"
                                            wire:click="$emit('destroy', {{ $product->id }})" />
                                    </section>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        @else
            <div class="flex text-2xl items-center justify-center px-3 pb-6">
                {{ trans('products.failed_search') }}
            </div>
        @endif
        @if ($products->hasPages())
            <div class="p-6 border-t">
                {{ $products->links() }}
            </div>
        @endif
    </x-table>

    @push('modals')
        <script>
            window.addEventListener('delete', event => {
                const productId = event.detail.productId;

                Swal.fire({
                    title: "{{ trans('products.flash_message.delete_question') }}",
                    text: "{{ trans('flashMessages.delete_alert') }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "{{ trans('flashMessages.delete_confirm') }}"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('deleteProduct', productId);
                        Swal.fire({
                            title: "{{ trans('flashMessages.delete_confirmed') }}",
                            text: "{{ trans('products.flash_message.successfully_deleted') }}",
                            icon: "success"
                        });
                    }
                });
            });
        </script>
    @endpush
</div>
