<a {{ $attributes->merge(['class' => 'flex text-center justify-center text-white/70 bg-gradient-to-b from-cyan-500 to-slate-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:to-blue-500 hover:text-white transition ease-in-out duration-200']) }}>
    {{ $slot }}
</a>