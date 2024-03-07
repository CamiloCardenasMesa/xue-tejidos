@auth
    <aside class="absolute h-full max-w-max bg-white border-r-2">
        <div class="flex flex-col mt-9">
            <x-aside-link href="{{ route('products') }}" :active="request()->routeIs('products')">
                <figure>
                    @include('icons.product-icon')
                </figure>
                <h4>Products</h4>
            </x-aside-link>
            <x-aside-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                <figure>
                    @include('icons.user-icon')
                </figure>
                <h4>Users</h4>
            </x-aside-link>
            <x-aside-link href="{{ route('posts') }}" :active="request()->routeIs('posts')">
                <figure>
                    @include('icons.post-icon')
                </figure>
                <h4>posts</h4>
            </x-aside-link>
            <x-aside-link href="{{ route('forum') }}" :active="request()->routeIs('forum')">
                <figure>
                    @include('icons.forum-icon')
                </figure>
                <h4>forum</h4>
            </x-aside-link>
            <x-aside-link href="{{ route('design') }}" :active="request()->routeIs('design')">
                <figure>
                    @include('icons.design-icon')
                </figure>
                <h4>design</h4>
            </x-aside-link>
        </div>
    </aside>
@endauth
