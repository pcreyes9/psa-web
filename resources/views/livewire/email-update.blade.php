<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-lg-6 ">
            <form wire:submit.prevent>
                <div class="form-group mb-4 ">
                    <h1>{{ $psa_id }}</h1>

                    <label for="psa_id">PSA ID Number</label>
                    <input wire:model="psa_id" type="text" class="form-control" id="psa_id" placeholder="Enter PSA ID #">
                    <p>You entered: {{ $psa_id }}</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

