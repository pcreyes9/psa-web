<section id="contact" class="contact section">
    @if (session()->has('message'))
        <div class="alert alert-warning">
            {{ session('message') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center justify-content-start mb-3 gap-3">

        <div class="col-6 col-md-3 mb-2 mb-md-0">
            <input 
                type="text"
                wire:model.live="search"
                name="search"
                id="search"
                class="form-control"
                placeholder="Enter PSA ID..."
            >
        </div>

        <div class="text-start">
            <strong>Name:</strong> {{ $name }}
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-nowrap">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Booth Visited</th>
                    <th>Registration Time</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($boothVisit as $booth)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $booth->exhibitor_name }}</td>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($booth->created_at)->format('M d, Y h:i A') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            No booth visits found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="table-responsive mt-5">
        <table class="table table-bordered table-hover align-left text-nowrap">
            <thead class="table-dark text-left">
                <tr>
                    <th>#</th>
                    <th>Booths to Visit</th>
                    {{-- <th>Registration Time</th> --}}
                </tr>
            </thead>

            <tbody>
                @forelse ($boothsToVisit as $booth)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $booth->pharma_name }}</td>
                        {{-- <td class="text-center">
                            {{ \Carbon\Carbon::parse($booth->created_at)->format('M d, Y h:i A') }}
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-muted">
                            No booth visits found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>