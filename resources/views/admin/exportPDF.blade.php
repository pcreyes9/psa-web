<!DOCTYPE html>
<html>
    <head>
        <title>PDF EXPORT</title>
        <style>
            .page-break {
                page-break-after: always;
            }
            .img{
                width:60%;
                height:auto;
            }
            .text-center{
                text-align:center;
            }
        </style>
        <script>
            n =  new Date();
            y = n.getFullYear();
            m = n.getMonth() + 1;
            d = n.getDate();
            document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
        </script>
    </head>
    <body>

        @foreach ($info as $infos)
        
            <h2 style="text-align:left;float:left;">Name: {{ $infos->last_name }},  {{ $infos->first_name }}</h2> 
            <h1 style="text-align:right;float:right;"> # {{ $infos->id }}</h1> 
            <hr style="clear:both;"/>
            <h2 >PSA ID: {{ $infos->psa_id }}</h2>
            @if ($infos->membership == 'RM' && $infos->discount_id != 'Not available')
                <h2>Membership: {{ $infos->membership }} | with Senior/PWD</h2>
            @elseif ($infos->membership == 'TM' && $infos->discount_id != 'Not available')
                <h2>Membership: {{ $infos->membership }} | with PWD</h2>
            @else
                <h2>
                    Membership: {{ $infos->membership }}
                </h2>
            @endif
            
            <h3>
                Contact: {{ $infos->email }} | {{ $infos->contact_number }} 
            </h3>
            <h3>
                Reg Date: {{ $infos->created_at }} | Status: {{ $infos->status }}
            </h3>
            <br>
            <img
                src="{{ asset('storage/photos/payments/'.$infos->proof_payment) }}"
                style="height:600px;width:auto"
                class="img"
                alt=""
            >
            <div class="page-break"></div>
        @endforeach
    </body>
</html>


