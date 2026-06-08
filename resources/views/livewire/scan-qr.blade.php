<div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden"
     style="max-width: 500px; width:100%;">

        <!-- Header -->
        <div class="bg-primary bg-gradient text-white p-4">

            <div class="d-flex align-items-center">

                <div class="rounded-circle bg-white text-primary fw-bold
                            d-flex align-items-center justify-content-center"
                    style="width:70px;height:70px;font-size:24px;">

                    {{ strtoupper(substr($member?->mem_first_name ?? 'M',0,1)) }}

                </div>

                <div class="ms-3">

                    <h3 class="mb-1 fw-bold">
                        {{ $member?->mem_last_name }},
                        {{ $member?->mem_first_name }}
                    </h3>

                    <small class="opacity-75">
                        PSA Member
                    </small>

                </div>

            </div>

        </div>

        <!-- Member Details -->
        @if($member)
            <div class="p-4">

                <div class="alert alert-success border-0 rounded-3">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Member Verified
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="border rounded-3 p-3">
                            <small class="text-muted d-block">
                                PSA ID
                            </small>
                            <strong>
                                {{ $member->member_id_no }}
                            </strong>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="border rounded-3 p-3">
                            <small class="text-muted d-block">
                                Chapter
                            </small>
                            <strong>
                                {{ $member->psa_chapter_code }}
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
                                Phone Number
                            </small>
                            <strong>
                                {{ $member->mem_email_address }}
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Scanner -->
        <div class="p-4 bg-light">

            <h6 class="fw-bold mb-3">
                QR Code Scanner
            </h6>

            <div class="bg-white rounded-4 border shadow-sm p-2">
                <div id="reader"></div>
            </div>

            @if($success)
                <div class="text-center mt-4">
                    <button
                        onclick="window.location.reload()"
                        class="btn btn-primary btn-lg rounded-pill px-4">

                        Scan Another QR

                    </button>
                </div>
            @endif

            <div class="text-center mt-3">
                <small class="text-muted">
                    Ensure proper lighting and camera permission is enabled
                </small>
            </div>
        </div>
    </div>

    <!-- QR Script -->
    <script src="https://unpkg.com/html5-qrcode"></script>

    <script>

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
                    aspectRatio: 1.0,
                    rememberLastUsedCamera: true
                },
                false
            );

            scanner.render(onScanSuccess);
        }

        function onScanSuccess(decodedText, decodedResult) {

            if (!isScanning) return;

            isScanning = false;

            // Beep Sound
            const beep = new Audio(
                'https://actions.google.com/sounds/v1/cartoon/wood_plank_flicks.ogg'
            );

            beep.play();

            // Mobile Vibration
            if (navigator.vibrate) {
                navigator.vibrate(200);
            }

            console.log(`Code matched = ${decodedText}`);

            // Send to Livewire
            Livewire.dispatch('qrScanned', {
                code: decodedText
            });

            // Stop Scanner
            scanner.clear();
        }

        // Initial Start
        document.addEventListener('DOMContentLoaded', () => {

            startScanner();

        });

    </script>
</div>