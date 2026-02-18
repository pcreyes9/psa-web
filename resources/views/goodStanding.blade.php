<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        {{-- {{ $slot }} --}}
        <livewire:settings.good-standing/>
    </flux:main>
</x-layouts.app.sidebar>
