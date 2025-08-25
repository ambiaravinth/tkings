@extends('layout.main')

@section('title', 'TKINGS-Receipts')

@section('content')

<body>

    <!-- Header -->
    @include('layout.header')

    <main>
        <div class="row ms-1 me-1">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="infowindow text-center p-2">
                    <h6>Add New Receipt</h6>
                    <div class="text-start">
                        <form action="{{ url('addreceipt') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="newamount" class="form-label">Add Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="newdate" class="form-label">Select Date & Time</label>
                                <input type="datetime-local" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="newscreenshot" class="form-label">Add Screenshot Image</label>
                                <input type="file" class="form-control" id="screenshot" name="screenshot" accept=".png, .jpg, .jpeg">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="infowindow text-center p-2">
                    <h6>Pending Receipts</h6>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    @if(auth()->user()->role == 'admin')
                                    <td>
                                        <a href="{{ url('accept-payment/'.$payment->id) }}" class="btn btn-sm m-1 btn-success"><i class="bi bi-check"></i></a>
                                        <a href="{{ url('reject-payment/'.$payment->id) }}" class="btn btn-sm m-1 btn-danger"><i class="bi bi-x"></i></a>
                                    </td>
                                    @endif
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
