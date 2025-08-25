<header>
    <div class="d-flex justify-content-center align-items-center w-100">
        <nav class="navbar w-100 d-flex justify-content-between">
            <a href="{{ url('/') }}">
                <div class="bussinessinfo d-flex align-items-center">
                    <?php
                    $theme_logo = auth()->user()->theme == 'dark' ? 'Logo-gold.png' : (auth()->user()->theme == 'light' ? 'Logo-white.png' : 'Logo-green.png');
                    $theme_logo = public_url('images/logo/' . $theme_logo);
                    ?>
                    <img class="navbar-logo" src="{{ $theme_logo }}" alt="Logo" style="max-width:50px;">
                    <h1 class="bussiness-name ms-2">TKings Groups</h1>
                </div>
            </a>
            <div class="dropdown">
                <div class="d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" role="button">
                    <?php
                        if(auth()->user()->image){
                            $userimage = "data:".auth()->user()->image_mime.";base64,".base64_encode(auth()->user()->image);
                        }else{
                            $userimage = public_url('images/user/user0001.jpg');
                        } ?>
                    <img class="rounded-circle me-1" src="{{ $userimage }}" alt="User"
                        style="max-width:50px;">
                    <span class="ms-1">{{auth()->user()->username}}</span>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ url('profile') }}"><i class="bi bi-person me-2"></i>Profile</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ url('settings') }}"><i class="bi bi-gear me-2"></i>Settings</a>
                    </li>
                    <li>
                        <form action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
