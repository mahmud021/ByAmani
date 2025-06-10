@props(['class' => ''])

@php
    $label = trim($slot);

    $map = [
        'Best Seller' => ['color' => 'bg-yellow-100 text-yellow-800', 'icon' => <<<SVG
            <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2
                       2 6.477 2 12s4.477 10 10 10z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m9 12 2 2 4-4" />
            </svg>
        SVG],
        'New' => ['color' => 'bg-green-100 text-green-800', 'icon' => <<<SVG
            <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
        SVG],
        'Limited' => ['color' => 'bg-red-100 text-red-800', 'icon' => <<<SVG
            <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7" />
            </svg>
        SVG],
    ];

    $color = $map[$label]['color'] ?? 'bg-gray-100 text-gray-800';
    $icon = $map[$label]['icon'] ?? null;
@endphp

<span class="inline-flex items-center gap-x-1 text-xs font-medium px-2 py-1 rounded-full {{ $color }} {{ $class }}">
    @if ($icon)
        {!! $icon !!}
    @endif
    {{ $label }}
</span>
<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
</div>
