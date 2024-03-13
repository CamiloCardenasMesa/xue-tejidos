<a {{ $attributes->merge(['class' => 'flex text-center justify-center items-center cursor-pointer p-4 bg-white border border-1 border-black/30 font-semibold text-xs text-black uppercase tracking-widest hover:bg-black hover:text-white transition ease-in-out duration-200']) }}>
    {{ $slot }}
</a>