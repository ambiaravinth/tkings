@extends('layout.main')

@section('title', 'TKINGS-Pay')

@section('content')

<body>

    <!-- Header -->
    @include('layout.header')

    <main>
        <div class="row ms-1 me-1">
            <div class="col-sm-12 col-md-6 col-lg-5">
                <div class="infowindow text-center p-2">
                    <h5>Pay</h5>
                    <div class="text-start">
                        <div class="mb-3">
                            <label for="newamount" class="form-label">Enter Amount</label>
                            <input type="number" class="form-control" id="newamount" value="100.00">
                        </div>
                    </div>
                    <hr style="color: <?= auth()->user()->theme == 'dark' ? 'gold' : (auth()->user()->theme == 'light' ? 'black' : '#214b3a') ?>; border: 2px solid;">
                    <div class="text-start">
                        <label for="newamount" class="form-label">Scan any UPI App</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="QRcontainer bg-light p-2">
                            <div id="qrcode"></div>
                        </div>
                    </div>
                    <br>
                    <a class="btn btn-primary" href="#" id="paybutton">OR click to pay</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('layout.footer')

</body>

<script>
    $(document).ready(function() {
        var Amount = $('#newamount').val();
        var PayURL = "upi://pay?pa=9597694709@axisbank&cu=INR&am=" + Amount + "&pn=Ambi&tn=Investment";
        var qrcode = new QRCode("qrcode", PayURL);
        $("#paybutton").attr('href', PayURL);

        $('#newamount').on("input", function() {
            $("#qrcode").html('');
            Amount = $('#newamount').val();
            PayURL = "upi://pay?pa=9597694709@axisbank&cu=INR&am=" + Amount + "&pn=Ambi&tn=Investment";
            qrcode = new QRCode("qrcode", PayURL);
            $("#paybutton").attr('href', PayURL);
        });
    });
</script>

@endsection
