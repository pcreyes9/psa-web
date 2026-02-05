@props(['status', 'type' => 'success'])

@php
$colors = [
    'success' => 'bg-green-100 text-green-800 border-green-300',
    'error' => 'bg-red-100 text-red-800 border-red-300',
    'info' => 'bg-blue-100 text-blue-800 border-blue-300',
];
@endphp

@if ($status)
<div {{ $attributes->merge([
    'class' => 'px-4 py-3 rounded-md font-medium text-sm flex items-center gap-2 ' . ($colors[$type] ?? $colors['success'])
]) }}>
    <span>{{ $status }}</span>
</div>
@endif
