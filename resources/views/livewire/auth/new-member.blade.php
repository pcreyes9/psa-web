<div class="flex flex-col gap-6">
    <x-auth-header :title="__('PSA Membership Form')" :description="__('Fill out the form below')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" type="status" :status="session('status')" />
    <x-auth-session-status class="text-center" type="info" :status="session('info')" />
    <x-auth-session-status class="text-center" type="error" :status="session('error')" />

    <form wire:submit="create" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="last_name"
            :label="__('Last Name')"
            type="text"
            required
            autofocus
            placeholder="Enter your last name"
        />
        <flux:input
            wire:model="first_name"
            :label="__('First Name')"
            type="text"
            required
            autofocus
            placeholder="Enter your first name"
        />
        <flux:input
            wire:model="middle_initial"
            :label="__('Middle Initial')"
            type="text"
            required
            autofocus
            placeholder="Enter your middle initial"
        />

        <flux:select :label="__('Gender')" wire:model="gender" placeholder="Choose your gender">
            <flux:select.option>Male</flux:select.option>
            <flux:select.option>Female</flux:select.option>
        </flux:select>
        
        <flux:input
            wire:model="birth_date"
            :label="__('Birth Date')"
            type="date"
            required
            autofocus
            placeholder="Enter your birth date"
        />
        <flux:input
            wire:model="email"
            :label="__('Email Address')"
            type="email"
            required
            autofocus
            placeholder="Enter your email address"
        />
        <flux:input
            wire:model="contact_number"
            :label="__('Contact Number')"
            type="number"
            required
            autofocus
            placeholder="Enter your contact number"
        />

        <flux:input
            wire:model="prc_number"
            :label="__('PRC Number')"
            type="text"
            required
            autofocus
            placeholder="Enter your PRC number"
        />

        <flux:input type="file" wire:model="payment" label="Upload your membership payment"/>
        
        <flux:button variant="primary" type="submit" class="w-full">{{ __('Submit') }}</flux:button>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        {{ __('Or, return to') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('log in') }}</flux:link>
    </div>
</div>
