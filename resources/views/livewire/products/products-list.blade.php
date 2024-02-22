<div>
    <x-table>
        {{-- delete product message --}}
        @if ($errorMessage)
            <div class="bg-red-200 text-red-800 shadow-sm p-4 mb-4">
                {{ $errorMessage }}
            </div>
        @endif
    
        {{-- search bar --}}
        <div class="flex items-center p-3 lg:p-6 gap-2">
            <x-input class="flex-1" type="text" wire:model="search" placeholder="busca un producto" />
            {{-- @livewire('products.create-product') --}}
        </div>
    
        {{-- table --}}
        @if ($products->count())
        <section class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 shadow-sm">
                <thead>
                    <tr>
                        <th scope="col" class="px-7 pb-3 text-left text-xs font-medium text-gray-500 uppercase">
                            <div class="flex items-center justify-between">
                                imagen
                            </div>
                        </th>
                        <th wire:click="order('name')" scope="col"
                            class="w-1/3 px-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                            <div class="flex items-center justify-between">
                                <div>
                                    nombre
                                </div>
                                <x-sort-icon :field="'name'" :sort="$sort" :direction="$direction" />
                            </div>
                        </th>
                        <th wire:click="order('price')" scope="col"
                            class="px-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                            <div class="flex items-center justify-between">
                                <div>
                                    price
                                </div>
                                <x-sort-icon :field="'price'" :sort="$sort" :direction="$direction" />
                            </div>
                        </th>
                        <th wire:click="order('stock')" scope="col"
                            class="px-3 text-left text-xs font-medium text-gray-500 cursor-pointer uppercase">
                            <div class="flex items-center justify-between">
                                Existencias
                                <x-sort-icon :field="'stock'" :sort="$sort" :direction="$direction" />
                            </div>
                        </th>
                        <th scope="col" class="px-3 text-left text-xs font-medium text-gray-500 uppercase">
                            estado
                        </th>
                        <th scope="col" class="px-3 text-left text-xs font-medium text-gray-500 uppercase">
                            categoria
                        </th>
                        <th scope="col" class="px-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="even:bg-gray-100 odd:bg-white text-gray-700">
                            <td class="py-2 lg:py-4 pl-3 md:p-3 lg:px-6">
                                <img class="w-16 h-16 rounded-full object-cover" src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ 'image of ' . $product->name }}">
                            </td>
                            <td class="px-3 font-bold">
                                {{ $product->name }}
                            </td>
                            <td class="px-3 font-bold">
                                ${{ $product->price }}
                            </td>
                            <td class="px-3">
                                {{ $product->stock }}
                            </td>
                            <td class="px-3 py-2">
                                {{ $product->enable }}
                            </td>
                            <td class="px-3 py-2">
                                {{ $product->category_id }}
                            </td>
                            <td class="p-3 lg:pr-6">
                                <section class="flex items-center">
                                    @livewire('products.edit-product', ['product' => $product], key($product->id))
                                    <article class="p-3 ml-3 bg-gray-200 rounded-lg cursor-pointer"
                                        wire:click="$emit('destroy', {{ $product->id }})">
                                        <x-delete-icon />
                                    </article>
                                </section>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        @else
            <div class="flex text-2xl items-center justify-center px-3 pb-6">
                No se encontró ningún usuario, intenta con otra palabra.
            </div>
        @endif
        @if ($products->hasPages())
            <div class="p-6 border-t">
                {{ $products->links() }}
            </div>
        @endif
    </x-table>
</div>
