<footer>
    <div class="w-100 text-center p-2">
        <div class="row justify-content-center">
            <div class="payop col col-sm-1 col-md-2 col-lg-2 ms-1 pt-2 pb-2 {{ (request()->path() == '/') ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <h3><i class="bi bi-house-fill"></i></h3>
                    <span>Home</span>
                </a>
            </div>
            <div class="payop col col-sm-1 col-md-2 col-lg-2 ms-1 pt-2 pb-2 {{ (request()->path() == 'receipts') ? 'active' : '' }}">
                <a href="{{ url('receipts') }}">
                    <h3><i class="bi bi-file-richtext"></i></h3>
                    <span>Receipts</span>
                </a>
            </div>
            <div class="payop col col-sm-1 col-md-2 col-lg-2 ms-1 pt-2 pb-2 {{ (request()->path() == 'pay') ? 'active' : '' }}">
                <a href="{{ url('pay') }}">
                    <h3><i class="bi bi-qr-code-scan"></i></h3>
                    <span>Pay</span>
                </a>
            </div>
            <div class="payop col col-sm-1 col-md-2 col-lg-2 ms-1 me-1 pt-2 pb-2 {{ (request()->path() == 'payments') ? 'active' : '' }}">
                <a href="{{ url('payments') }}">
                    <h3><i class="bi bi-clock-history"></i></h3>
                    <span>Payments</span>
                </a>
            </div>
        </div>
    </div>
</footer>
