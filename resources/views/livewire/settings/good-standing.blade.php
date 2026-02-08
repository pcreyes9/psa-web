<section class="w-full">

    <form wire:submit.prevent="submit">

        <div class="relative mb-6 w-full">
            <flux:heading size="xl" level="1">
                {{ __('Certificate of Good Standing') }}
            </flux:heading>

            <flux:subheading size="lg" class="mb-6">
                {{ __('Philippine Society of Anesthesiologists, Inc') }}
            </flux:subheading>

            <flux:separator variant="subtle" />
        </div>

        <div class="grid grid-cols-12 gap-4">

            <!-- Purpose -->
            <div class="col-span-12 md:col-span-4">
                <flux:select :label="__('Purpose')" wire:model="purpose">
                    <flux:select.option>PBA Written Exam</flux:select.option>
                    <flux:select.option>PBA Oral Exam</flux:select.option>
                    <flux:select.option>Philhealth Purposes</flux:select.option>
                    <flux:select.option>Philhealth Renewal</flux:select.option>
                    <flux:select.option>Philhealth Accreditation Renewal</flux:select.option>
                    <flux:select.option>Whatever purpose it may serve her best</flux:select.option>
                    <flux:select.option>Whatever purpose it may serve him best</flux:select.option>
                </flux:select>
            </div>

            <!-- Gender -->
            {{-- <div class="col-span-12 md:col-span-2">
                <flux:select :label="__('Gender')" wire:model="gender">
                    <flux:select.option>He</flux:select.option>
                    <flux:select.option>She</flux:select.option>
                </flux:select>
            </div> --}}

            <!-- Membership Type -->
            <div class="col-span-12 md:col-span-2">
                <flux:input 
                    value="{{ $mem_type }}"
                    :label="__('Membership Type')" 
                    type="text" 
                    readonly
                />
            </div>

            <!-- Submit Button -->
            <div class="col-span-12 md:col-span-4 flex items-end">
                <flux:button 
                    type="submit" 
                    variant="primary"
                    class="w-full"
                >
                    {{ __('Submit Request') }}
                </flux:button>
            </div>
        </div>
    </form>
</section>
