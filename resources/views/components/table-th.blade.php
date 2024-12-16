@props([
    'width' => null,
])
<th scope="col" width="{{ $width }}" {{ $attributes->merge(['class' => 'px-3 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-100 dark:bg-gray-900']) }}>
    {{ $slot }}
</th>
