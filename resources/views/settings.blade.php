@extends('layout.main')

@section('title', 'TKINGS-Settings')

@section('content')

<body>

    <!-- Header -->
    @include('layout.header')

    <main>
        <div class="row ms-1 me-1">
            <div class="col-sm-12 col-md-6 col-lg-5">
                <div class="infowindow text-center p-2">
                    <h6>Settings</h6>
                    <form action="{{ url('themechange') }}" method="post">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="theme" class="form-label">Theme</label>
                            <select class="form-select" name="theme" id="theme">
                                <option disabled {{ empty($theme) ? 'selected' : '' }}>Select Theme</option>
                                <option value="dark" {{ $theme === 'dark' ? 'selected' : '' }}>Dark</option>
                                <option value="light" {{ $theme === 'light' ? 'selected' : '' }}>Light</option>
                                <option value="green" {{ $theme === 'green' ? 'selected' : '' }}>Green</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('layout.footer')

</body>

@endsection
