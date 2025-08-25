@extends('layout.main')

@section('title', 'TKINGS-Payments')

@section('content')

<body>

    <!-- Header -->
    @include('layout.header')

    <main>
        <div class="row ms-1 me-1">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="infowindow text-center p-2">
                    <h5>Payments</h5>
                    <div class="text-center mt-3">
                        <table class="w-100" id="myTable">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    @if(auth()->user()->role == 'admin')
                                    <th scope="col">Prof</th>
                                    @endif
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($payments as $payment)
                                <tr class="m-1">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->pay_time }}</td>
                                    @if(auth()->user()->role == 'admin')
                                    <td>
                                        @if($payment->prof)
                                        <img class="thumpimg" style="cursor: pointer;" src="{{ public_url($payment->prof) }}" alt="Proof" width="30" height="30" data-src="{{ public_url($payment->prof) }}">
                                        @else
                                        NA
                                        @endif
                                    </td>
                                    @endif
                                    <td>{{ $payment->status == 0 ? 'Pending' : ($payment->status == 1 ? 'Approved' : 'Rejected') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Modal -->
    <div class="modal" tabindex="-1" id="imagemodel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Prof Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="w-100" id="modelphoto" src="#" alt="No Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layout.footer')

</body>

<script>
    $(document).ready(function() {
        // Toggle password visibility
        $(".thumpimg").on("click", function() {
            var src = $(this).data("src");
            $('#imagemodel').show();
            $('#modelphoto').attr('src', src);
        });

        $('.btn-close').on("click", function() {
            $('#imagemodel').hide();
        });
    });
</script>

@endsection
