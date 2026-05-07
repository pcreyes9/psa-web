<!DOCTYPE html>
<html>
    <head>
        
        <title>{{ $psa_id }} - PSA MIDYEAR 2026 CERTIFICATE</title>

        <style>
            @font-face {
                font-family: 'Edwardian Alternate Medium';
                src: url("{{ public_path('fonts/Edwardian Alternate Medium.ttf') }}") format('truetype');
            }
            @page {
                size: letter portrait;
                margin: 7mm;
            }
            
            body {
                margin: 0;
                padding: 0;
                /* width: 210mm;
                height: 297mm; */
                /* font-family: Arial, sans-serif; */
                color: #000;

                /* Letterhead background */
                background-image: url("{{ public_path('images/CERTHEAD.jpg') }}");
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            .content {
                margin: 37mm 5mm 10mm 5mm; /* top, right, bottom, left */
                
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

                text-align: center;
                font-size: 45px;
                line-height: 1;
            }
            .content h1,
            .content h2,
            .content h3,
            .content p 
            .content div {
                margin: -5;
            }

            .title {
                font-size: 180px;
                /* font-weight: bold; */
                letter-spacing: 5px;
                /* margin-bottom: 80px; */
            }
            
            .signature-section {
                position: fixed;
                bottom: 3mm;   /* distance from bottom of page */
                left: 0;
                width: 100%;
            }

            .signature-table {
                width: 100%;
                border-collapse: collapse;
            }

            .signature-cell {
                width: 50%;
                text-align: center;
                vertical-align: top;
            }

            .signature-cell.center {
                width: 100%;
                padding-top: 40px;
            }

            .sig-name {
                font-size: 60px;
            }

            .sig-title {
                font-size: 55px;
                line-height: 1.2;
            }

            .cpd{
                font-size: 40px;
            }

            .mt-40 { margin-top: 40px; }
        </style>
    </head>

    <body>
        <div class="content">
            <h2 style="font-size: 80px;">PHILIPPINE SOCIETY OF ANESTHESIOLOGISTS, INC.</h2>
            <p style="font-size: 60px;"><i>presents this</i></p>
            <div class="title"><i>Certificate of Attendance</i></div>
            <p style="font-size: 60px;"><i>to</i></p>

            <h1 style="font-size: 100px;">
                {{ $first_name }} {{ $middle_name }} {{ $last_name }}, MD
            </h1>
            <p style="font-size: 60px;"><i>for having attended the</i></p>
            <p style="font-size: 95px; margin: -5px">PSA MIDYEAR CONVENTION 2026</p>
            <p style="font-size: 60px;"><i>with the theme</i></p>
            <p><i style="font-size: 90px; font-weight: bold;">BREAKING BARRIERS:</i><br><span style="font-size: 85px;">ADVANCING ANESTHESIA <br> IN A RESOURCE - LIMITED ENVIRONMENT</span></p>
            <p style="font-size: 60px;"><i>held at KCC Events and Convention Center, General Santos City held at KCC Events and Convention Center, General Santos City on May 14 to 16, 2026</i></p>
        </div>

        <div class="signature-section">
            <!-- TOP ROW -->
            <table class="signature-table">
                <tr>
                    <td class="signature-cell">
                        <div class="sig-name">JOSELITO T. MORETE, MD, FPSA</div>
                        <div class="sig-title">Secretary, PSA, Inc.</div>
                    </td>

                    <td class="signature-cell">
                        <div class="sig-name">MA. JANETH B. SERRANO, MD, FPSA</div>
                        <div class="sig-title">Vice President, PSA, Inc.</div>
                        <div class="sig-title">Chairperson, Committee on CPD</div>
                    </td>
                </tr>
            </table>

            <!-- BOTTOM ROW -->
            <table class="signature-table" style="margin-top: 7mm;">
                <tr>
                    <td class="signature-cell center">
                        <div class="sig-name">FRANCIS B. MAYUGA, MD, FPSA</div>
                        <div class="sig-title">President, PSA, Inc.</div>
                    </td>
                </tr>
            </table>

            <table class="signature-table" style="margin-top: 5mm;">
                <tr>
                    <td class="signature-cell center" style="font-size: 60px; font-weight: bold;">
                        <div class="cpd">PROFESSIONAL REGULATION COMMISSION</div>
                        <div class="cpd">Program Accreditation Number : MED-2012-001-11788</div>
                        <div class="cpd">CPD CREDIT : 6 Units | Refno: {{ $ref_no }}</div>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>