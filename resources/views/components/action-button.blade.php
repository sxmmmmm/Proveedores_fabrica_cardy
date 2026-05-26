@props([
    'color' => 'teal',
    'href'  => null,
    'type'  => 'button',
])

@php
    $colors = [
        'teal'  => ['bg' => '#4DC9C2', 'hover' => '#3ab5ae'],
        'pink'  => ['bg' => '#F4A7B9', 'hover' => '#e08fa0'],
        'gray'  => ['bg' => '#E5E7EB', 'hover' => '#D1D5DB', 'text' => 'text-gray-700'],
        'red'   => ['bg' => '#EF4444', 'hover' => '#DC2626'],
        'green' => ['bg' => '#1D6F42', 'hover' => '#155734'],
    ];
    $c    = $colors[$color] ?? $colors['teal'];
    $text = $c['text'] ?? 'text-white';

    $base = "inline-flex items-center justify-center gap-1 min-w-[80px] px-3 py-1.5 rounded-md text-xs font-semibold whitespace-nowrap transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-[#4DC9C2] {$text}";
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