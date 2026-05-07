<div class="min-vh-100 d-flex align-items-center justify-content-center py-5">

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="max-width: 420px; width: 100%;">

        <!-- Header -->
        <div class="bg-primary text-white text-center py-4">
            <h3 class="fw-bold mb-1">
                QR Code Scanner
            </h3>

            <p class="mb-0 small opacity-75">
                Point your camera at the QR Code
            </p>
        </div>

        <!-- Scanner -->
        <div class="p-4">

            <div class="bg-white border rounded-4 overflow-hidden p-2">
                <div id="reader"></div>
            </div>

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
        let isScanning = true;

        function onScanSuccess(decodedText, decodedResult) {

            if (!isScanning) return;

            isScanning = false;

            // Beep Sound
            const beep = new Audio(
                'https://actions.google.com/sounds/v1/cartoon/wood_plank_flicks.ogg'
            );
            beep.play();

            // Mobile vibration
            if (navigator.vibrate) {
                navigator.vibrate(200);
            }

            console.log(`Code matched = ${decodedText}`);

            // Send to Livewire
            Livewire.dispatch('qrScanned', {
                code: decodedText
            });

            // Stop scanner after successful scan
            html5QrcodeScanner.clear();

            // Optional restart after 3 seconds
            /*
            setTimeout(() => {
                isScanning = true;
                html5QrcodeScanner.render(onScanSuccess);
            }, 3000);
            */
        }

        const html5QrcodeScanner = new Html5QrcodeScanner(
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

        html5QrcodeScanner.render(onScanSuccess);
    </script>

</div>