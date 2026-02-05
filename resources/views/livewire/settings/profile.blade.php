<section class="w-full">
@include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('View your information')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input 
                wire:model="mem_id" 
                value="{{ $mem_data->member_id_no }}"
                :label="__('PSA ID')" 
                type="number" 
                required 
                autofocus 
                autocomplete="mem_id" 
                readonly
            />

            {{-- <flux:input 
                wire:model="prc" 
                value="{{ $mem_data->mem_prc_no }}"
                :label="__('PRC')" 
                type="number" 
                required 
                autofocus 
                autocomplete="prc" 
                disabled
            /> --}}
            
            <flux:input 
                wire:model="name" 
                :label="__('Name')" 
                type="text" 
                required 
                autofocus 
                autocomplete="name" 
                readonly
            />
            
            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" readonly/>

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                    <div>
                        <flux:text class="mt-4">
                            {{ __('Your email address is unverified.') }}

                            <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                {{ __('Click here to re-send the verification email.') }}
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                {{-- <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div> --}}

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>

    {{-- <livewire:settings.delete-user-form /> --}}
    </x-settings.layout>
</section>
