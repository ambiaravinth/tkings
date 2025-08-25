@extends('layout.main')

@section('title', 'TKINGS-Profile')

@section('content')

<body>

    <!-- Header -->
    @include('layout.header')

    <main>
        <div class="row ms-1 me-1">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="infowindow text-center p-2">
                    <h6>Profile</h6>
                    <div class="text-start">
                        <div class="text-center p-2">
                            <?php
                        if(auth()->user()->image){
                            $userimage = "data:".auth()->user()->image_mime.";base64,".base64_encode(auth()->user()->image);
                        }else{
                            $userimage = public_url('images/user/user0001.jpg');
                        } ?>
                            <img class="rounded" src="{{ $userimage }}" alt="No Image..." width="155px">
                        </div>
                        <form action="{{ url('dbupload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="userimage" class="form-label">User Image</label>
                                <input type="file" class="form-control" id="userimage" name="userimage" accept=".png, .jpg, .jpeg" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="infowindow text-center p-2">
                    <h6>Basic Details</h6>
                    <div class="text-start">
                        <form action="{{ url('updatebasicprofile') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" value="{{ $user->username }}" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $user->mobile }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="infowindow text-center p-2">
                    <h6>Change Password</h6>
                    <div class="text-start">
                        <form action="{{ url('changepassword') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="currentpassword" class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="currentpassword" id="currentpassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="newpassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('layout.footer')

</body>

@endsection
