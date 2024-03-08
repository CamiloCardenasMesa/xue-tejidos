<a
    {{ $attributes->merge(['class' => 'flex text-center justify-center py-4 px-8 text-white hover:text-black bg-black/80 hover:bg-white/80 border border-white/50 hover:border hover:border-black font-medium cursor-pointer text-sm text-white uppercase tracking-widest transition ease-in-out duration-300']) }}>
    {{ $slot }}
</a>
