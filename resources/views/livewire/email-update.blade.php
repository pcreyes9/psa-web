<div class="container">
    <div class="row justify-content-center text-left">
        <div class="col-lg-4">
            <form wire:submit.prevent>
                <div class="form-group mb-4">
                    <label class="mb-1">PSA ID #</label>
                    <input type="text" class="form-control text-left" id="psa_id"  wire:model.live="psa_id" placeholder="PSA ID #">
                </div>
                <div class="form-group">
                    <label class="mb-1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" wire:model.live="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>