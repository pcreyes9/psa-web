<section class="w-full">
@include('partials.settings-heading')
    <x-settings.layout :heading="__('Profile')" :subheading="__('View your information')">
        <x-auth-session-status class="text-center mb-5" type="status" :status="session('status')" />
        
        <form wire:submit="updateProfileInformation">
            <div class="grid grid-cols-12 gap-4">

                {{-- Last Name --}}
                <div class="col-span-12 md:col-span-3">
                    <flux:input 
                        :label="__('Last Name')" 
                        wire:model="last_name"
                        value="{{ $mem_data->mem_last_name }}"
                        type="text"
                        :disabled="!$editing"
                    />
                </div>

                {{-- First Name --}}
                <div class="col-span-12 md:col-span-3">
                    <flux:input 
                        :label="__('First Name')"
                        wire:model="first_name"
                        value="{{ $mem_data->mem_first_name }}"
                        type="text"
                        :disabled="!$editing"
                    />
                </div>

                {{-- Middle Initial --}}
                <div class="col-span-12 md:col-span-2">
                    <flux:input 
                        :label="__('Middle Initial')"
                        wire:model="middle_initial" 
                        value="{{ $mem_data->mem_middle_name }}"
                        type="text"
                        :disabled="!$editing"
                    />
                </div>

                {{-- Email --}}
                <div class="col-span-12 md:col-span-3">
                    <flux:input 
                        :label="__('Email Address')"
                        wire:model="email_address"
                        type="text"
                        :disabled="!$editing"
                    />
                    <p class="mt-1 text-sm text-gray-500">
                        This email is the one registered in the system. You can update it the with one you used to register your website account.
                    </p>
                </div>

                {{-- Buttons --}}
                <div class="col-span-12 md:col-span-4 flex items-end gap-2">

                    {{-- VIEW MODE --}}
                    @if(!$editing)
                        <flux:button 
                            type="button"
                            variant="primary"
                            class="w-full"
                            wire:click="enableEdit"
                        >
                            {{ __('Edit Profile') }}
                        </flux:button>
                    @else

                        {{-- EDIT MODE --}}
                        <flux:button 
                            type="submit"
                            variant="primary"
                            class="w-full"
                            wire:loading.attr="disabled"
                        >
                            {{ __('Submit Request') }}
                        </flux:button>

                        {{-- Optional Cancel --}}
                        <flux:button 
                            type="button"
                            variant="ghost"
                            wire:click="$set('editing', false)"
                        >
                            {{ __('Cancel') }}
                        </flux:button>

                    @endif
                </div>
            </div>
        </form>
    {{-- <livewire:settings.delete-user-form /> --}}
    </x-settings.layout>
</section>
