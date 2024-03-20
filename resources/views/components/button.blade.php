<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 lg:px-4 py-3 bg-black font-semibold border border-black text-xs text-white uppercase tracking-widest hover:bg-[#666666] hover:border-[#666666] hover:text-white focus:bg-gradient-to-r from-[#252525] to-[#666666] focus:text-white focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
