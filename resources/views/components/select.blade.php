@props(['classes' => ''])

<select {{ $attributes->merge(['class' => "border border-black/30 focus:border-black focus:ring-0 w-full $classes"]) }}>
    {{ $slot }}
</select>
