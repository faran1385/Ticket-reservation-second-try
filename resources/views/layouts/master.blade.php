<!DOCTYPE html>
<html style="overflow-x: clip">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{url('js/jQuery/jquery-3.6.3.min.js')}}"></script>
    <script src="{{url('js/home.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .coming-input-label:after{
            content: "";
            position: absolute;
            right: 10px;
            top: 0;
            bottom: 0;
            width: 20px;
            background: url('https://cdn-icons-png.flaticon.com/512/748/748113.png') center / contain no-repeat;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <div class="navbar navbar-light shadow-lg navbar-expand-md">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a href="#" target="blank" class="nav-link">
                    <img src="{{url('/images/logo.png')}}" class="ms-md-5 ms-1" style="width: 3rem;height: 3rem">
                    <span class="fs-2 position-relative  d-md-none ms-3" style="top: .5rem;">Alibaba</span>
                </a>
            </div>
            <button class="navbar-toggler m-1" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" data-bs-target="navbar-ticket-dropdown-menu"
                               class="dropdown-toggle nav-link fs-4 rounded btn-hover">
                                Ticket
                            </a>
                            <ul class="dropdown-menu" id="navbar-ticket-dropdown-menu">
                                <li class="dropdown-item">Domestic flight</li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">International flight</li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">Train</li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">Bus</li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ms-lg-5 ms-md-2">
                        <div class="dropdown ">
                            <a href="#" data-bs-toggle="dropdown" data-bs-target=""
                               class="navbar-stay-dropdown-menu fs-4 nav-link dropdown-toggle btn-hover rounded">
                                stay
                            </a>
                            <ul class="dropdown-menu " id="navbar-stay-dropdown-menu">
                                <li class="dropdown-item">Hotel</li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">Villa and residence</li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ms-lg-5 ms-md-2 fs-4">
                        <a href="#" class="nav-link btn-hover rounded">tour</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ms-auto me-2 d-none d-md-flex">
                <li class="nav-link d-flex btn-hover rounded">
                    <svg viewBox="0 0 24 24" width="1.5rem" fill="currentColor" class="text-grays-500"
                         data-v-c2875078="">
                        <path d="M17.25 12.75A3.75 3.75 0 0 1 21 16.5v3.75a.75.75 0 0 1-.75.75H3.75a.75.75 0 0 1-.75-.75V16.5a3.75 3.75 0 0 1 3.75-3.75h10.5Zm0 1.5H6.75A2.25 2.25 0 0 0 4.5 16.5v3h15v-3a2.25 2.25 0 0 0-2.118-2.246l-.132-.004ZM12 3a4.5 4.5 0 1 1 0 9 4.5 4.5 0 1 1 0-9Zm0 1.5a3 3 0 1 0-.001 5.999A3 3 0 0 0 12 4.5Z"
                              fill-rule="evenodd"></path>
                    </svg>
                    <a class="nav-link" href="#">
                        <h4 class="fw-normal mt-1">Login</h4>
                    </a>
                </li>
                <li class="nav-link d-flex btn-hover rounded ms-lg-5 ms-md-2">
                    <svg viewBox="0 0 24 24" width="1.5rem" fill="currentColor" data-v-c2875078="">
                        <path d="M6.75 21C4.682 21 3 18.982 3 16.5a.75.75 0 0 1 .75-.75H6l.006-11.146a.75.75 0 0 1 .011-.264C6.19 3.563 6.904 3 7.714 3a1.74 1.74 0 0 1 1.698 1.34c.016.077.11.16.23.16.124 0 .215-.082.232-.16.173-.777.887-1.34 1.698-1.34.81 0 1.524.563 1.696 1.34.018.077.111.16.232.16.12 0 .214-.083.232-.16.172-.777.886-1.34 1.696-1.34.811 0 1.525.563 1.697 1.34.018.078.11.16.232.16.121 0 .215-.083.231-.16A1.74 1.74 0 0 1 19.285 3a1.74 1.74 0 0 1 1.686 1.295.752.752 0 0 1 .029.203V18.75a2.253 2.253 0 0 1-2.118 2.246L18.75 21h-12ZM19.285 4.5c-.122 0-.214.083-.232.165C18.881 5.439 18.168 6 17.357 6c-.81 0-1.524-.561-1.696-1.335-.018-.082-.11-.165-.233-.165-.122 0-.214.083-.232.165C15.024 5.439 14.312 6 13.5 6c-.81 0-1.523-.561-1.697-1.335-.017-.082-.109-.165-.231-.165-.122 0-.215.083-.233.165C11.167 5.439 10.453 6 9.643 6c-.811 0-1.524-.561-1.696-1.335-.018-.082-.11-.165-.233-.165-.094 0-.17.05-.208.11L7.5 15.75h8.249a.75.75 0 0 1 .75.75c0 1.6.943 2.91 2.127 2.996l.123.004a.75.75 0 0 0 .75-.75V4.62a.245.245 0 0 0-.215-.12Zm-4.233 12.75H4.571c.25 1.293 1.133 2.25 2.179 2.25h9.207a4.891 4.891 0 0 1-.905-2.25Zm-1.556-6a.75.75 0 1 1 0 1.5H9.75a.75.75 0 1 1 0-1.5h3.747Zm3.754-3a.75.75 0 1 1 0 1.5H9.748a.75.75 0 1 1 0-1.5h7.502Z"
                              fill-rule="evenodd"></path>
                    </svg>
                    <a class="nav-link" href="#">
                        <h4 class="fw-normal mt-1">Track order</h4>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
<div>
    @yield('content')
</div>
<svg viewBox="0 0 500 150" preserveAspectRatio="none" class=""   style="height: 10rem; width: 100%; ">
    <path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none;fill: rgb(52, 144, 220);">
    </path>
</svg>
<footer class="bg-primary">
    <div class="container">
        <div class="row align-items-baseline">
            <div class="col-lg-8 col-12 d-flex">
                <div class="row w-100">
                    <div class="col-lg-4 mb-5 text-lg-start text-center">
                        <ul class="list-unstyled">
                            <li class="fw-bold fs-4 mb-2">Why site name</li>
                            <a  class="text-decoration-none text-dark" href="#"><li class="mb-2">Permissions</li></a>
                            <a  class="text-decoration-none text-dark" href="#"><li class="mb-2">Docs</li></a>
                            <a  class="text-decoration-none text-dark" href="#"><li>Site in the media</li></a>
                        </ul>
                    </div>
                    <div class="col-lg-4 mb-5 text-lg-start text-center">
                        <ul class="list-unstyled">
                            <li class="fw-bold fs-4 mb-2">Support Site</li>
                            <a  class="text-decoration-none text-dark" href="#"><li class="mb-2">contact us</li></a>
                            <a  class="text-decoration-none text-dark" href="#"><li class="mb-2">Rules</li></a>
                            <a  class="text-decoration-none text-dark" href="#"><li class="mb-2">Frequently Asked Questions</li></a>
                            <a  class="text-decoration-none text-dark" href="#"><li>Travel essentials</li></a>
                        </ul>
                    </div>
                    <div class="col-lg-4 mb-5 text-lg-start text-center">
                        <ul class="list-unstyled">
                            <li class="fw-bold fs-4 mb-2">About site</li>
                            <a  class="text-decoration-none text-dark" href="#"><li class="mb-2">About us</li></a>
                            <a  class="text-decoration-none text-dark" href="#"> <li class="mb-2">Site magazine</li></a>
                            <a  class="text-decoration-none text-dark" href="#"><li>Application</li></a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-lg-start justify-content-center">
                        <img src="{{url('/images/logo.png')}}" class="w-25">
                        <h1>Alibaba</h1>
                    </div>
                </div>
                <div class="row mt-3 text-lg-start text-center">
                    <p class="mb-lg-3"><span class="text-muted fw-bold">Support office address :</span> Tehran, Ekbatan / corner of Lashgari Highway / Insurance company 4th Insurance St / Flowers dead end / Plaque 1</p>
                    <p class=""><span class="text-muted fw-bold">Support office phone :</span> 021-43900000</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
