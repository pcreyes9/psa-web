<section id="contact" class="contact section">
    <div class="">
        <div class="mb-3 pt-n5">
            <button type="button" class="btn btn-dark solid" wire:click="showChecker" style="box-shadow: 2px 2px 3px gray; background-color: #ac071a; color: white; font-weight: bold">PSA ID NO. Checker</button>
            @if($show)
                <div class="row mt-3 mb-3text-center justify-content-center mb-5">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class ="mb-1" style="font-weight: 750; color:black;">Enter Last Name:</label>
                            <input style="box-shadow: 2px 2px 3px gray; background-color: #000066; color: white; font-weight: bold" class="form-control form-control-subject" placeholder="" wire:model.live='name'>
                        </div>
                        {{-- <button type="button" class="btn btn-primary solid blank mb-3 mt-3" wire:click="checker" style="background: #d6cb00; color: #000066">Check</button> --}}
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class ="mb-1" style="font-weight: 750; color:black;">PSA ID No.</label>
                        @if ($this->res != null)
                            <textarea class="form-control " rows="6" style="box-shadow: 2px 2px 3px gray; background-color: white; color: black; font-weight: bold; text-align:left;" id="message-text" readonly>{{ implode("\n", $res)}}</textarea>
                        @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row gy-4">
            <div class="col-lg-12">
                <form wire:submit.prevent="submit" class="php-email-form" >
                    @csrf
                    {{-- {{ $psa_id }} --}}
                    <div class="col-12">
                            @if (session()->has('message'))
                                <div class="alert alert-warning">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    <div class="row gy-4">
                        <div class="col-md-2">
                            <input type="number" name="psa_id" wire:model.live='psa_id' class="form-control" placeholder="PSA ID No." required="">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="first_name" value="{{ $member?->mem_first_name }}"  placeholder="First Name" readonly>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="last_name" value="{{ $member?->mem_last_name }}" placeholder="Last Name" readonly>
                        </div>

                        <div class="col-md-2">
                            <input type="text" class="form-control" name="middle_initial" value="{{ $member?->mem_middle_name }}" placeholder="Middle Initial" readonly>
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="hospital_name" wire:model="hospitalName" placeholder="Name of Hospital" required="">
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="hospital_address" wire:model="hospitalAddress" placeholder="Hospital Address" required="">
                        </div>

                        <div class="col-md-4">
                            <input type="number" class="form-control" name="prc_number" wire:model="prc_number" placeholder="PRC Number (7 digits)" required="">
                        </div>

                        <div class="col-md-4">
                            <input type="email" class="form-control" name="email_address" wire:model="email_address" placeholder="Email" required="">
                        </div>

                        <div class="col-md-4">
                            <input type="number" class="form-control" name="contact_number" wire:model="contact_number" placeholder="Contact Number" required="">
                        </div>
                        
                        <div class="col-md-4 text-start">
                            <label class ="mb-1" style="font-weight: 600; color:black">Registration Type:</label><br>
                            <div class="form-check">
                                <input {{ ($member?->psa_mem_type === 'RM') ? 'checked' : '' }} class="form-check-input" type="radio" name="reg_type_radio" id="reg_type_radio1" disabled>
                                <label class="form-check-label" for="reg_type_radio1" >
                                    Regular Member
                                </label>
                            </div>
                            <div class="form-check">
                                <input {{ ($member?->psa_mem_type === 'LM') ? 'checked' : '' }} class="form-check-input" type="radio" name="reg_type_radio" id="reg_type_radio2" disabled>
                                <label class="form-check-label" for="reg_type_radio2">
                                    Life Member
                                </label>
                            </div>
                            <div class="form-check">
                                <input {{ ($member?->psa_mem_type === 'TM') ? 'checked' : '' }} class="form-check-input" type="radio" name="reg_type_radio" id="reg_type_radio3" disabled>
                                <label class="form-check-label" for="reg_type_radio3">
                                    Trainee Member
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4 text-start">
                            <label class ="mb-1" style="font-weight: 600; color:black">Discount ID:</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model.live='disc' name="discount_radio" id="discount_radio1" value="senior_disc">
                                <label class="form-check-label" for="discount_radio1">
                                    Senior Citizen
                                </label>
                            </div>
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model.live='disc' name="discount_radio" id="discount_radio2" value="pwd_disc">
                                <label class="form-check-label" for="discount_radio2">
                                    Person With Disability
                                </label>
                            </div> --}}
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model.live='disc' name="discount_radio" id="discount_radio3" value="non_disc" checked>
                                <label class="form-check-label" for="discount_radio3">
                                    None
                                </label>
                            </div>
                        </div>

                        @if ($disc == "senior_disc" || $disc == "pwd_disc")
                            <div class="col-md-4">
                                <label style=" font-weight: 750; font-size: medium; color: black">Discount ID Upload</label><br>
                                <input style="color: black" type="file" wire:model="discount_img" required>
                                @error('discount_img') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        @endif
                        

                        <div class="col-md-4 text-start">
                            <label class ="mb-1" style="font-weight: 600; color:black">Proof of Payment</label><br>
                            <input style="color: black" type="file" wire:model="payment_proof" required>
                            @error('payment_proof') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- <div class="col-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                        </div> --}}

                        <div class="col-12 text-end">
                            
                            {{-- <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div> --}}

                            <button type="submit" class="mt-4 w-full">Register</button>
                        </div>
                    </div>
                </form>
            </div><!-- End Contact Form -->
        </div>
    </div>
</section><!-- /Contact Section -->