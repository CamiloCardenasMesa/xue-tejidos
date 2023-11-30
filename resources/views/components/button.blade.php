<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 lg:px-4 py-3 bg-gradient-to-b from-cyan-500 to-slate-800 rounded-md font-semibold text-xs rounded-md font-semibold text-xs text-white/60 uppercase tracking-widest hover:to-cyan-500 hover:text-white focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
