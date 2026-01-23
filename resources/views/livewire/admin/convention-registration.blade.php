<section>
    <div class="mx-4 mt-5">
        <div class="section-title">
            <h2 class="text-center mb-5">Admin Convention Registration</h2>
            @if (session('success'))
                <div class="alert alert-success mt-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
    
                <!-- Left: Search -->
                <div class="d-flex justify-content-start">
                    <input type="text"
                        wire:model.live="search"
                        name="search"
                        id="search"
                        class="form-control"
                        placeholder="Enter last name..."
                        style="max-width: 350px;">
                </div>

                <!-- Right: Sort + Export -->
                <div class="d-flex align-items-center gap-3">
                    <div class="dropdown position-relative">
                        <button class="btn btn-secondary dropdown-toggle"
                                type="button"
                                id="sortDropdown"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                            Sort by: {{ $label }}
                        </button>

                        <ul class="dropdown-menu p-3" aria-labelledby="sortDropdown">
                            <li class="form-check mb-2">
                                <input wire:model.live="sort" class="form-check-input"
                                    type="radio" name="sort" id="dateNew" value="dateNew">
                                <label class="form-check-label" for="dateNew">
                                    Date (newest)
                                </label>
                            </li>

                            <li class="form-check">
                                <input wire:model.live="sort" class="form-check-input"
                                    type="radio" name="sort" id="dateOld" value="dateOld">
                                <label class="form-check-label" for="dateOld">
                                    Date (oldest)
                                </label>
                            </li>

                            <li class="form-check">
                                <input wire:model.live="sort" class="form-check-input"
                                    type="radio" name="sort" id="pending" value="pending">
                                <label class="form-check-label" for="pending">
                                    Status (Pending)
                                </label>
                            </li>

                            <li class="form-check">
                                <input wire:model.live="sort" class="form-check-input"
                                    type="radio" name="sort" id="approved" value="approved">
                                <label class="form-check-label" for="approved">
                                    Status (Approved)
                                </label>
                            </li>
                        </ul>
                    </div>

                    <button class="btn btn-secondary"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#exportPdfModal">
                        Export PDF
                    </button>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover align-middle text-nowrap">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>PSA ID</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>MI</th>
                            <th>Email</th>
                            <th>Membership</th>
                            {{-- <th>Country</th> --}}
                            <th>Discount</th>
                            <th>Registered</th>
                            <th>Updated</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($reg as $regs)
                            <tr>
                                <td class="text-center">{{ $regs->id }}</td>
                                <td class="text-center fw-bold">{{ $regs->psa_id }}</td>
                                <td>{{ $regs->last_name }}</td>
                                <td>{{ $regs->first_name }}</td>
                                <td class="text-center">
                                    {{ strtoupper(substr($regs->middle_name, 0, 1)) }}
                                </td>
                                <td>{{ $regs->email }}</td>
                                <td class="text-center">{{ $regs->membership }}</td>
                                {{-- <td class="text-center">{{ $regs->country }}</td> --}}
                                <td class="text-center">
                                    <span class="badge 
                                        {{ str_contains(strtolower($regs->discount_id ?? ''), 'no discount') 
                                            ? 'bg-secondary' 
                                            : 'bg-success' }}">
                                            <a href="{{ asset('photos/discounts/'.$regs->discount_id) }}" class="text-white text-decoration-none">{{ str_contains(strtolower($regs->discount_id ?? ''), 'no discount') 
                                            ? 'No Discount' 
                                            : 'With Discount' }}</a>
                                        
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ asset('photos/payments/'.$regs->proof_payment) }}" 
                                    style="color: black; text-decoration: none;">
                                        {{ $regs->created_at ?? '-' }}
                                    </a>
                                </td>

                                {{-- <td class="text-center">{{ $regs->created_at ?? '-' }}</td> --}}
                                <td class="text-center">{{ $regs->updated_at ?? '-' }}</td>
                                <td class="text-center">
                                    <span class="badge 
                                        {{ $regs->status === 'Approved' ? 'bg-success' : 
                                        ($regs->status === 'Pending' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                        {{ $regs->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary">
                                        Approve
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="text-center text-muted py-4">
                                    No registrations found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>  
            <div class="m-2 pb-4 flex-grow">
                <p>{{ $reg->onEachSide(0)->links() }}</p>
            </div>  
        </div>
    </div>
    <div class="modal fade" id="exportPdfModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Enter Range to Print PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <form wire:submit.prevent="exportPDF">

                        <div class="mb-3">
                            <label class="form-label">From ID</label>
                            <input type="number" wire:model="from" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">To ID</label>
                            <input type="number" wire:model="to" class="form-control" required>
                        </div>

                        <button wire:loading.attr="disabled"
                                type="submit"
                                class="btn btn-primary w-100">

                            <span wire:loading class="spinner-border spinner-border-sm"></span>
                            <span wire:loading.remove>Print</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>