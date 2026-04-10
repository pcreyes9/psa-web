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
                            <div class=""><small class="text-muted">*Only CONFIRMED payments of registrants will be listed here.</small></div>

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
                        <div class="text-muted"><i>Please enter the same name that appears on your PRC ID.</i></div>

                        <div class="col-md-2">
                            <label class="mb-1" style="font-weight: 700; color:black;">PSA ID No.</label>
                            <input type="number" class="form-control" name="psa_id" wire:model.live='psa_id' placeholder="PSA ID No." required="">
                        </div>

                        <div class="col-md-4">
                            <label class="mb-1" style="font-weight: 700; color:black;">First Name</label>
                            <input type="text" class="form-control" name="first_name" wire:model='first_name' placeholder="First Name" required="">
                        </div>

                        <div class="col-md-4">
                            <label class="mb-1" style="font-weight: 700; color:black;">Last Name</label>
                            <input type="text" class="form-control" name="last_name" wire:model='last_name'  placeholder="Last Name"  required="">
                        </div>

                        <div class="col-md-2">
                            <label class="mb-1" style="font-weight: 700; color:black;">Middle Initial</label>
                            <input type="text" class="form-control" name="middle_initial" wire:model='middle_initial'  placeholder="Middle Initial" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="mb-1" style="font-weight: 700; color:black;">PRC Number</label>
                            <input type="number" class="form-control" name="prc_number" wire:model='prc_number'  placeholder="PRC Number (7 digits)" required="">
                        </div>

                        <div class="col-md-4">
                            <label class="mb-1" style="font-weight: 700; color:black;">Email</label>
                            <input type="email" class="form-control" name="email_address" wire:model='email_address'  placeholder="Email" required="">
                        </div>

                        <div class="col-md-4">
                            <label class="mb-1" style="font-weight: 700; color:black;">Contact Number</label>
                            <input type="number" class="form-control" name="contact_number" wire:model='contact_number'  placeholder="Contact Number" required="">
                        </div>
                        <div class="col-md-6 text-start mt-5">
                            <p class="mb-3" >Midyear Convention 2026 Workshops</p>


                            @foreach ($wrshps as $sessions)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model='wrshp' name="workshop" id="workshop-{{ $sessions['name'] }}" value="{{ $sessions['name'] }}" required {{ $sessions['count'] >= 60 ? 'disabled' : '' }}>
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