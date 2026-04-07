<section id="contact" class="contact section ">
    <div class="row justify-content-center"> {{-- center horizontally --}}
        <div class="col-lg-6"> {{-- control width + center block --}}
            <form wire:submit.prevent="submit" class="php-email-form text-center">
                @csrf

                <div class="col-12">
                    @if (session()->has('message'))
                        <div class="alert alert-warning">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <h1 class="text-center mb-4 text-uppercase">{{ $this->booth_name }}</h1>
                <div class="row justify-content-center gy-4">
                    <div class="col-md-6"> {{-- narrower input --}}
                        <label class="mb-1 fw-bold text-dark">PSA ID No. (4-digit)</label>
                        <input 
                            type="number" 
                            class="form-control text-center" 
                            name="psa_id" 
                            wire:model.live="psa_id" 
                            placeholder="PSA ID No." 
                            required
                        >
                    </div>
                </div>
                {{-- {{ $psa_id }} --}}

                @if ($btnShow)
                    <button 
                    type="submit"
                    class="mt-4 w-full"
                    wire:loading.remove
                >
                    Register
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
</section>