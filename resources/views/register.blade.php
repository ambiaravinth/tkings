@extends('layout.main')

@section('title', 'TKINGS-Login')

@section('content')

<body class="d-flex justify-content-center align-items-center">
    <div class="container text-center login-container">
        <h1 class="mb-4">Register</h1>

        <form method="post" action="{{ url('save-register') }}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                <span class="input-group-text"><i class="bi bi-eye-slash" id="password-eye-icon"></i></span>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register <i class="bi bi-box-arrow-in-right"></i></button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Toggle password visibility
            $("#password-eye-icon").on("click", function() {
                $(this).toggleClass("bi-eye bi-eye-slash");
                const type = $("#password").attr("type") === "password" ? "text" : "password";
                $("#password").attr("type", type);
            });
        });
    </script>

</body>

@endsection
