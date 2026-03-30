<section id="contact" class="contact section">
    <div class="">
        <div class="mb-3 pt-n5">
            <button type="button" class="btn btn-dark solid" wire:click="showChecker" style="box-shadow: 2px 2px 3px gray; background-color: #ac071a; color: white; font-weight: bold">PSA ID NO. Checker</button>
            @if($show)
                <div class="row mt-3 mb-3 text-center justify-content-center mb-5">
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
                                <div class="form-control p-0"
                                    style="
                                        box-shadow: 2px 2px 3px gray;
                                        background-color: white;
                                        font-weight: bold;
                                        max-height: 200px;   /* control height here */
                                        overflow-y: auto;    /* enable vertical scroll */
                                        text-align: left;
                                    ">

                                    @foreach($res as $index => $item)
                                        <div 
                                            class="p-1 border-bottom row-clickable"
                                            style="cursor: pointer;"
                                            {{-- wire:click="selectRow({{ $index }})" --}}
                                        >
                                            {{ $item }}
                                        </div>
                                        
                                    @endforeach
                                    
                                </div>
                                <div class="mt-3"><small class="text-muted">*Only the CONFIRMED Registrants will be listed here.</small></div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
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
                            <input type="number" class="form-control" name="psa_id" wire:model.live='psa_id'  placeholder="PSA ID No." required="">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="first_name" value="{{ $member?->first_name }}"  placeholder="First Name" readonly>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="last_name" value="{{ $member?->last_name }}" placeholder="Last Name" readonly>
                        </div>

                        <div class="col-md-2">
                            <input type="text" class="form-control" name="middle_initial" value="{{ $member?->middle_name }}" placeholder="Middle Initial" readonly>
                        </div>

                        {{-- <div class="col-md-6">
                            <input type="text" class="form-control" name="hospital_name" wire:model="hospitalName" placeholder="Name of Hospital" required="">
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="hospital_address" wire:model="hospitalAddress" placeholder="Hospital Address" required="">
                        </div> --}}

                        <div class="col-md-4">
                            <input type="number" class="form-control" name="prc_number" value="{{ $member?->prc_number }}" placeholder="PRC Number (7 digits)" required="">
                        </div>

                        <div class="col-md-4">
                            <input type="email" class="form-control" name="email_address" value="{{ $member?->email }}" placeholder="Email" required="">
                        </div>

                        <div class="col-md-4">
                            <input type="number" class="form-control" name="contact_number" value="{{ $member?->contact_number }}" placeholder="Contact Number" required="">
                        </div>
                        <div class="col-md-6 text-start mt-5">
                            <p class="mb-2" >Midyear Convention 2026 Workshops</p>


                            @foreach ($wrshps as $sessions)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model.live='wrshp' name="workshop" id="workshop-{{ $sessions['name'] }}" value="{{ $sessions['name'] }}" required>
                                    <label class="form-check-label" style="color: black" for="workshop-{{ $sessions['name'] }}">
                                       <strong>{{ $sessions['name'] }}</strong> <br> <i>(Registered  {{ $sessions['count'] }} out of 60)</i>
                                    </label>
                                </div>
                            @endforeach
                            
                        </div>
                        
                        
                        <div class="col-12 text-end">
                            
                            {{-- <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div> --}}

                            @if ( $btnShow && $btnSubmit)
                                <button 
                                    type="submit"
                                    class="mt-4 w-full"
                                    wire:loading.remove
                                >
                                    Register
                                </button>

                                <p><span wire:loading>
                                        Processing...
                                    </span>
                                </p>

                            @endif         
                        </div>
                    </div>
                </form>
            </div><!-- End Contact Form -->
        </div>
    </div>
</section><!-- /Contact Section -->