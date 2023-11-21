<x-table>
    <div class="flex items-center justify-between gap-3 px-6 py-6">
        <x-input class="flex-1 gap-3" type="text" wire:model="search" placeholder="busca un post" />
        @livewire('create-post')
    </div>
    @if ($posts->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th wire:click="orderList('id')" scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                        <div class="flex items-center justify-between">
                            <h3 class="pr-6">
                                ID
                            </h3>
                            <x-sort-icon :field="'id'" :sort="$sort" :direction="$direction" />
                        </div>
                    </th>
                    <th wire:click="orderList('title')" scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                        <div class="flex items-center justify-between">
                            title
                            <x-sort-icon :field="'title'" :sort="$sort" :direction="$direction" />
                        </div>
                    </th>
                    <th wire:click="orderList('content')" scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                        <div class="flex items-center justify-between">
                            content
                            <x-sort-icon :field="'content'" :sort="$sort" :direction="$direction" />
                        </div>
                    </th>
                    <th scope="col" class="relative xp-6 py-3">
                        <span class="sr-only">edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-4">
                            {{ $post->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->content }}
                        </td>
                        <td class="px-6 py-4">
                            @livewire('edit-post', ['post' => $post], key($post->id))
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="px-6 py-6">
            No se encontró ningún post, intenta con otra palabra.
        </div>
    @endif
    @if ($posts->hasPages())
        <div class="px-6 py-3">
            {{ $posts->links() }}
        </div>
    @endif
</x-table>
