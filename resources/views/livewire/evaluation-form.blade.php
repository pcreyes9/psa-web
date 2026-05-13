<section id="contact" class="contact ">
    <div class="mt-n5">
        <div class="row justify-content-center ">
            <div class="col-lg-6 ">
                <form wire:submit.prevent="submit" class="php-email-form text-center">
                    @csrf
                    
                    <div class="col-12">
                        @if (session()->has('message'))
                            <div class="alert alert-warning">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="row justify-content-center gy-4">
                        <div class="col-md-6"> {{-- narrower input --}}
                            <label class="mb-1 fw-bold text-dark">PSA ID No. (4-digit)</label>
                            <input 
                                type="text" 
                                class="form-control text-center" 
                                name="psa_id" 
                                wire:model.live="psa_id" 
                                placeholder="PSA ID No." 
                                x-on:keydown.enter.prevent
                                required
                            >
                        </div>
                    </div>
                    {{-- {{ $psa_id }} --}}


                    @if ($btnShow)
                        <p>Name: {{ $first_name }} {{ $middle_name }} {{ $last_name }}</p>
                        <button 
                            type="submit"
                            class="mt-4 w-full"
                            wire:loading.remove
                        >
                            Download Evaluation Form
                        </button>

                        <p>
                            <span wire:loading>
                                Processing...
                            </span>
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
    
    
</section>