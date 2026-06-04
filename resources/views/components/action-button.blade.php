@props([
    'color' => 'teal',
    'href'  => null,
    'type'  => 'button',
])

@php
    $colors = [
        'teal'  => ['bg' => '#14B8A6', 'hover' => '#0d9488'],
        'pink'  => ['bg' => '#E11D48', 'hover' => '#be123c'],
        'rose'  => ['bg' => '#E11D48', 'hover' => '#be123c'],
        'gray'  => ['bg' => '#E5E7EB', 'hover' => '#D1D5DB', 'text' => 'text-gray-700'],
        'red'   => ['bg' => '#E11D48', 'hover' => '#be123c'],
        'green' => ['bg' => '#16A34A', 'hover' => '#15803d'],
        'dark'  => ['bg' => '#0F172A', 'hover' => '#1e293b'],
    ];
    $c    = $colors[$color] ?? $colors['teal'];
    $text = $c['text'] ?? 'text-white';

    $base = "inline-flex items-center justify-center gap-1 min-w-[80px] px-3 py-1.5 rounded-md text-xs font-semibold whitespace-nowrap transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-teal-400 {$text}";
@endphp

@if($href)
    <a href="{{ $href }}"
       {{ $attributes->merge(['class' => $base]) }}
       style="background-color: {{ $c['bg'] }};"
       onmouseover="this.style.backgroundColor='{{ $c['hover'] }}'"
       onmouseout="this.style.backgroundColor='{{ $c['bg'] }}'">
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}"
            {{ $attributes->merge(['class' => $base]) }}
            style="background-color: {{ $c['bg'] }};"
            onmouseover="this.style.backgroundColor='{{ $c['hover'] }}'"
            onmouseout="this.style.backgroundColor='{{ $c['bg'] }}'">
        {{ $slot }}
    </button>
@endif
