<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Account Request')" :description="__('Enter your PSA ID Number')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" type="status" :status="session('status')" />
    <x-auth-session-status class="text-center" type="info" :status="session('info')" />
    <x-auth-session-status class="text-center" type="error" :status="session('error')" />

    <form wire:submit="sendAccountRequest" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model.live.debounce.1000ms="member_id"
            :label="__('PSA ID Number')"
            type="text"
            required
            autofocus
            placeholder="4 digits only"
        />
        @if ($showButton)
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Send Account Creation Request') }}</flux:button>
        @endif
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        {{ __('Or, return to') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('log in') }}</flux:link>
    </div>
</div>
