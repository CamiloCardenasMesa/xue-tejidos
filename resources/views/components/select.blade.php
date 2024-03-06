@props(['classes' => ''])

<select {{ $attributes->merge(['class' => "border border-gray-300 focus:border-black focus:ring-0 w-full $classes"]) }}>
    {{ $slot }}
</select>
