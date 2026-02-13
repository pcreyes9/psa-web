<section class="w-full">
@include('partials.settings-heading')
    <x-settings.layout :heading="__('Profile')" :subheading="__('View your information')">
        <form wire:submit="updateProfileInformation" >
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-3">
                    <flux:input 
                        :label="__('Last Name')" 
                        value="{{ $mem_data->mem_last_name }}"
                        type="text" 
                        readonly
                    />
                </div>
                <div class="col-span-12 md:col-span-3">
                    <flux:input 
                        :label="__('First Name')" 
                        value="{{ $mem_data->mem_first_name }}"
                        type="text" 
                        readonly
                    />
                </div>
                <div class="col-span-12 md:col-span-2">
                    <flux:input 
                        :label="__('Middle Initial')" 
                        value="{{ $mem_data->mem_middle_name }}"
                        type="text" 
                        readonly
                    />
                </div>
                <div class="col-span-12 md:col-span-3">
                    <flux:input 
                        :label="__('Email Address')" 
                        value="{{ $mem_data->mem_email_address }}"
                        type="text" 
                        readonly
                    />
                </div>

                <!-- Submit Button -->
                {{-- <div class="col-span-12 md:col-span-4 flex items-end">
                    <flux:button 
                        type="submit" 
                        variant="primary"
                        class="w-full"
                    >
                        {{ __('Submit Request') }}
                    </flux:button>
                </div> --}}
            </div>
        </form>
    {{-- <livewire:settings.delete-user-form /> --}}
    </x-settings.layout>
</section>
