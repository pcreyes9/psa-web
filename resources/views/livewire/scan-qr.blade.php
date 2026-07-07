<div class="min-vh-100 d-flex align-items-center justify-content-center py-5">

    <div
        class="card border-0 shadow-lg rounded-4 overflow-hidden"
        style="max-width: 550px; width: 100%;">

        {{-- MEMBER HEADER --}}
        @if($member)

            <div class="bg-primary bg-gradient text-white p-4">
                <div class="d-flex flex-column flex-sm-row align-items-center text-center text-sm-start">

                    @if(!empty($member->photo_path))

                        <div
                            class="rounded-circle overflow-hidden border border-3 border-white shadow-sm flex-shrink-0"
                            style="width:100px;height:100px;">

                            <img
                                src="{{ asset('storage/' . $member->photo_path) }}"
                                alt="{{ $member->mem_last_name }}"
                                style="
                                    width:100%;
                                    height:100%;
                                    object-fit:cover;
                                    object-position:50% 20%;
                                ">
                        </div>

                    @else

                        <div
                            class="rounded-circle bg-white text-primary fw-bold d-flex align-items-center justify-content-center flex-shrink-0"
                            style="
                                width:100px;
                                height:100px;
                                font-size:20px;
                            ">

                            {{ strtoupper(substr($member->member_id_no, 0, 4)) }}

                        </div>

                    @endif

                    <div class="ms-sm-3 mt-3 mt-sm-0">

                        <h4 class="mb-1 fw-bold">
                            {{ $member->mem_last_name }},
                            {{ $member->mem_first_name }}
                            {{ $member->mem_middle_name }}
                        </h4>

                        <small class="opacity-75">
                            PSA Member
                        </small>

                    </div>

                </div>


            </div>

        @endif

        {{-- MEMBER DETAILS --}}
        @if($member)

            <div class="p-4">

                <div class="alert alert-success border-0">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Member Verified
                </div>

                <div class="row g-3">

                    <div class="col-12 col-sm-4">
                        <div class="border rounded-3 p-3">
                            <small class="text-muted d-block">
                                PSA ID
                            </small>

                            <strong>
                                {{ $member->member_id_no }}
                            </strong>
                        </div>
                    </div>

                    <div class="col-12 col-sm-8">
                        <div class="border rounded-3 p-3">
                            <small class="text-muted d-block">
                                Chapter
                            </small>

                            <strong>
                                {{ $member->psa_chapter_code }}
                                -
                                {{ $member->psa_chapter_desc }}
                            </strong>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border rounded-3 p-3">
                            <small class="text-muted d-block">
                                Email Address
                            </small>

                            <strong>
                                {{ $member->mem_email_address }}
                            </strong>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border rounded-3 p-3">
                            <small class="text-muted d-block">
                                Mobile Number
                            </small>

                            <strong>
                                {{ $member->mem_mobile_no1 }}
                            </strong>
                        </div>
                    </div>

                </div>

                {{-- PHOTO SECTION --}}
                <hr class="my-4">

                {{-- Preview --}}
                @if($photo)

                    <div class="text-center mb-3">

                        <img
                            src="{{ $photo->temporaryUrl() }}"
                            class="img-thumbnail border-primary"
                            style="max-height:250px;">

                        <div class="small text-muted mt-2">
                            Preview
                        </div>

                    </div>

                @endif

                {{-- Upload --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Upload Photo
                    </label>

                    <input
                        type="file"
                        wire:model="photo"
                        accept="image/*"
                        class="form-control">

                </div>

                @error('photo')
                    <div class="alert alert-danger py-2">
                        {{ $message }}
                    </div>
                @enderror

                <div wire:loading wire:target="photo">
                    <div class="alert alert-info py-2">
                        Uploading image...
                    </div>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="d-grid gap-2">

                    <button
                        type="button"
                        wire:click="uploadPhoto"
                        class="btn btn-success">

                        <i class="bi bi-upload me-2"></i>
                        Save Photo

                    </button>

                    <button
                        type="button"
                        onclick="window.location.reload()"
                        class="btn btn-primary">

                        Scan Another QR

                    </button>

                </div>

            </div>

        @else

            {{-- QR SCANNER --}}
            <div class="p-4 bg-light">

                <h5 class="fw-bold mb-3">
                    QR Code Scanner
                </h5>

                <div class="bg-white border rounded-4 p-2 shadow-sm">
                    <div id="reader"></div>
                </div>

                <div class="text-center mt-3">
                    <small class="text-muted">
                        Ensure proper lighting and camera permission is enabled.
                    </small>
                </div>

            </div>

        @endif

        @script
        <script>

            if (!document.getElementById('reader')) {
                return;
            }

            let scanner;
            let isScanning = false;

            function startScanner() {

                isScanning = true;

                scanner = new Html5QrcodeScanner(
                    "reader",
                    {
                        fps: 10,
                        qrbox: {
                            width: 250,
                            height: 250
                        },
                        aspectRatio: 1,
                        rememberLastUsedCamera: true
                    },
                    false
                );

                scanner.render(onScanSuccess);
            }

            function onScanSuccess(decodedText) {

                if (!isScanning) return;

                isScanning = false;

                if (navigator.vibrate) {
                    navigator.vibrate(200);
                }

                Livewire.dispatch('qrScanned', {
                    code: decodedText
                });

                if (scanner) {
                    scanner.clear();
                }
            }

            startScanner();

        </script>

        @endscript

    </div>

</div>
