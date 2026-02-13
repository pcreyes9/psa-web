<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" type="info" :status="session('info')" />
    <x-auth-session-status class="text-center" type="error" :status="session('error')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        @if (!$this->showForm)
            <flux:input
                wire:model.live="member_id"
                :label="__('PSA ID No.')"
                type="text"
                required
                autofocus
                autocomplete="ID"
                :placeholder="__('4 digits only')"
            />
            <flux:input
                wire:model.live.debounce.1000ms="code"
                :label="__('PSA Code (case sensitive)')"
                type="text"
                required
                autofocus
                autocomplete="ID"
                :placeholder="__('sent in your email')"
            />
        @endif
        @if ($this->showForm)
            <flux:input
                wire:model="name"
                :label="__('Name')"
                type="text"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('Full name')"
                readonly
            />

            <flux:input
                wire:model="email"
                :label="__('Email address')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
            />

            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Password')"
            />

            <flux:input
                wire:model="password_confirmation"
                :label="__('Confirm password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Confirm password')"
            />

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full">
                    {{ __('Create account') }}
                </flux:button>
            </div>
        @endif

    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
