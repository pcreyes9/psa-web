<div class="min-vh-100 d-flex align-items-center justify-content-center py-5">

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden"
         style="max-width: 420px; width: 100%;">

        <div class="bg-primary text-white text-left py-4 px-3">

            <h1 class="fw-bold mb-3" style="font-size: 28px;">
                {{ $displayName }}
            </h1>

            <h1 class="fw-bold mb-3" style="font-size: 28px;">
                {{ $psa_id }}
            </h1>

        </div>

        <div class="p-4">

            <!-- QR Reader -->
            <div class="bg-white border rounded-4 overflow-hidden p-2">
                <div id="reader"></div>
            </div>

            <!-- Scan Result -->
            @if($success)
                <div class="alert alert-success mt-4">
                    <strong>Scanned:</strong>
                    {{ $scannedCode }}
                </div>
            @endif

            <!-- Refresh Page -->
            @if($success)
                <div class="text-center mt-3">
                    <button
                        onclick="window.location.reload()"
                        class="btn btn-primary rounded-pill px-4">
                        Scan Again
                    </button>
                </div>
            @endif

            <!-- Status -->
            <div class="text-center mt-4">
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