<div class="flex flex-col gap-6">

<x-auth-header :title="__('PSA Membership Form')" :description="__('Fill out the form below')" />

<!-- Session Status -->

<x-auth-session-status class="text-center" type="status" :status="session('status')" />
<x-auth-session-status class="text-center" type="info" :status="session('info')" />
<x-auth-session-status class="text-center" type="error" :status="session('error')" />

<form wire:submit="create" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

<!-- PERSONAL INFORMATION -->
<div class="lg:col-span-3 border-b pb-2 font-semibold text-lg">
    Personal Information
</div>

<flux:input
    wire:model="last_name"
    :label="__('Last Name')"
    type="text"
    required
    placeholder="Enter your last name"
/>

<flux:input
    wire:model="first_name"
    :label="__('First Name')"
    type="text"
    required
    placeholder="Enter your first name"
/>

<flux:input
    wire:model="middle_initial"
    :label="__('Middle Initial')"
    type="text"
    placeholder="Enter your middle initial"
/>

<flux:select :label="__('Gender')" wire:model="gender" placeholder="Choose your gender">
    <flux:select.option>Male</flux:select.option>
    <flux:select.option>Female</flux:select.option>
</flux:select>

<flux:input
    wire:model="civil_status"
    :label="__('Civil Status')"
    type="text"
    placeholder="Enter your civil status"
/>

<flux:input
    wire:model="citizenship"
    :label="__('Citizenship')"
    type="text"
    placeholder="Enter your citizenship"
/>

<!-- BIRTH INFORMATION -->
<div class="lg:col-span-3 border-b pb-2 font-semibold text-lg mt-4">
    Birth Information
</div>

<flux:input
    wire:model="birth_date"
    :label="__('Birth Date')"
    type="date"
    required
/>

<flux:input
    wire:model="birth_place"
    :label="__('Place of Birth')"
    type="text"
    placeholder="Enter your place of birth"
/>

<!-- CONTACT INFORMATION -->
<div class="lg:col-span-3 border-b pb-2 font-semibold text-lg mt-4">
    Contact Information
</div>

<flux:input
    wire:model="email"
    :label="__('Email Address')"
    type="email"
    required
    placeholder="Enter your email address"
/>

<flux:input
    wire:model="contact_number"
    :label="__('Contact Number')"
    type="text"
    required
    placeholder="Enter your contact number"
/>
<flux:input
    wire:model="home_telephone_number"
    :label="__('Home Telephone Number')"
    type="text"
    required
    placeholder="Enter your home telephone number"
/>

<div class="lg:col-span-3">
    <flux:input
        wire:model="home_address"
        :label="__('Home Address')"
        type="text"
        required
        placeholder="Enter your home address"
    />
</div>


<!-- PROFESSIONAL INFORMATION -->

<div class="lg:col-span-3 border-b pb-2 font-semibold text-lg mt-4">
    Professional Information
</div>

<!-- 4-column responsive grid -->

<div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- PRC -->
    <flux:input
        wire:model="prc_number"
        :label="__('PRC License No.')"
        type="text"
        required
        placeholder="PRC No."
        class="max-w-xs"
    />

    <flux:input
        wire:model="prc_expiration"
        :label="__('PRC Expiration')"
        type="date"
        required
        class="max-w-xs"
    />

    <!-- PMA -->
    <flux:input
        wire:model="pma_id_number"
        :label="__('PMA ID No.')"
        type="text"
        required
        placeholder="PMA ID No."
        class="max-w-xs"
    />

    <flux:input
        wire:model="pma_id_expiration"
        :label="__('PMA ID Expiration')"
        type="date"
        required
        class="max-w-xs"
    />

    <!-- PHIC -->
    <flux:input
        wire:model="phic_id_number"
        :label="__('PHIC ID No.')"
        type="text"
        required
        placeholder="PHIC ID No."
        class="max-w-xs"
    />

    <flux:input
        wire:model="phic_id_expiration"
        :label="__('PHIC ID Expiration')"
        type="date"
        required
        class="max-w-xs"
    />
</div>

<!-- PROFESSIONAL INFORMATION -->

<div class="lg:col-span-3 border-b pb-2 font-semibold text-lg mt-4">
    Education and Practice Information
</div>

<!-- 4-column responsive grid -->

<div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

    <!-- College of Medicine + Year Graduated -->
    <flux:input
        wire:model="college_of_medicine"
        :label="__('College of Medicine')"
        type="text"
        placeholder="Medical School"
    />

    <flux:input
        wire:model="college_year_graduated"
        :label="__('Year Graduated')"
        type="number"
        placeholder="YYYY"
        min="1900"
        max="2100"
    />

    <!-- Residency Training + Year Graduated -->
    <flux:input
        wire:model="residency_training"
        :label="__('Residency Training')"
        type="text"
        placeholder="Residency Hospital"
    />

    <flux:input
        wire:model="residency_year_graduated"
        :label="__('Year Graduated')"
        type="number"
        placeholder="YYYY"
        min="1900"
        max="2100"
    />

     <flux:input
        wire:model="local_component_society"
        :label="__('PMA Local Component Society')"
        type="text"
        placeholder="Local Component Society"
    />

    <!-- New Dropdown Input -->
    <flux:select 
        wire:model="regional_chapter" 
        :label="__('PSA Regional Chapter')" 
        placeholder="Select your regional chapter"
        class="md:col-span-2 lg:col-span-4"
    >
        <flux:select.option>General Anesthesia</flux:select.option>
        <flux:select.option>Regional Anesthesia</flux:select.option>
        <flux:select.option>Pediatric Anesthesia</flux:select.option>
        <flux:select.option>Cardiac Anesthesia</flux:select.option>
        <flux:select.option>Neuro Anesthesia</flux:select.option>
        <flux:select.option>Other</flux:select.option>
    </flux:select>

    <!-- Hospital Affiliation (wide) -->
    <flux:input
        wire:model="hospital_affiliation"
        :label="__('Hospital Affiliation')"
        type="text"
        placeholder="Hospital / Institution"
        class="md:col-span-2 lg:col-span-4"
    />

</div>

<div class="lg:col-span-3 border-b pb-2 font-semibold text-lg mt-4">
    Benefits
</div>

<!-- 4-column responsive grid -->

<div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

    <!-- College of Medicine + Year Graduated -->
    <flux:input
        wire:model="full_name"
        :label="__('Full Name')"
        type="text"
        placeholder="Full Name"
    />
    <flux:input
        wire:model="relationship"
        :label="__('Relationship')"
        type="text"
        placeholder="Relationship"
    />


</div>




<!-- PAYMENT -->
<div class="lg:col-span-3 border-b pb-2 font-semibold text-lg mt-4">
    Membership Payment
</div>

<div class="lg:col-span-3">
    <flux:input 
        type="file" 
        wire:model="payment" 
        label="Upload your membership payment"
    />
</div>

<div class="lg:col-span-3">
    <flux:button variant="primary" type="submit" class="w-full">
        {{ __('Submit') }}
    </flux:button>
</div>

</form>

<div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
    {{ __('Or, return to') }}
    <flux:link :href="route('login')" wire:navigate>{{ __('log in') }}</flux:link>
</div>

</div>
