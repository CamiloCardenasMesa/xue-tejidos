<x-table>
    <div class="px-6 py-6">
        <x-input type="text" wire:model="search" />
    </div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    title
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    content
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
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:bg-indigo-900">Edit</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-table>

