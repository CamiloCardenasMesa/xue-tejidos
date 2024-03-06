<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 mx-3 py-2 bg-white border border-gray-300 font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-transparent focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
