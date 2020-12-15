<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    {{--    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />--}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/css/toastr.min.css')}}"  rel="stylesheet"/>
    {{--    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />--}}
    <link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet" />


</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="black" data-active-color="warnning">

            <div class="logo">
{{--                <a href="/admin" class="simple-text logo-mini">--}}
{{--                    <div class="logo-image-small">--}}
{{--                        <img src="{{asset('assets/img/newlogo.png')}}">--}}

{{--                    </div>--}}
{{--                    <!-- <p>CT</p> -->--}}
{{--                </a>--}}
{{--                <a href="/admin" class="simple-text logo-normal">--}}
{{--                    Hyper Move--}}
{{--                </a>--}}

                    <table>
                        <td>
                            <a href="/admin" class="simple-text logo-normal"> - &#160; Hyper &#160; </a>
                        </td>

                        <td>
                            <a href="/admin" class="simple-text logo-mini">
                                <div class="logo-image-small">
                                    <img src="{{asset('assets/img/newlogo.png')}}">
                                </div>

                            </a>
                        </td>
                        <td>
                            <a href="/admin" class="simple-text logo-normal"> &#160; Move &#160;  &#160; - </a>
                        </td>
                    </table>


            </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="{{ Request::is('Deliverer-Dash')? 'active' : '' }}">
                    <a href="/Deliverer-Dash">
                        <i class="nc-icon nc-bank text-warning"></i>
                        <p>Dileverer Dashboard</p>
                    </a>
                </li>
                <li class="{{ Request::is('deliverer/profile')? 'active' : '' }}">
                    <a          href="http://127.0.0.1:8000/deliverer/profile" >
                        <i class="nc-icon nc-single-02 text-warning"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="{{ Request::is('deliverer/inventory')? 'active' : '' }} ">
                    <a class="nav-link active " href="http://127.0.0.1:8000/deliverer/inventory" >
                        <i class="nc-icon nc-shop text-warning"></i>
                        <span class="nav-link-text">Inventory</span>
                    </a>
                </li>
                <li class="{{ Request::is('deliverer/orders/*')? 'active' : '' }}">
                    <a href="http://127.0.0.1:8000/deliverer/orders/{{Auth::user()->id}}">
                        <i class="nc-icon nc-cart-simple text-warning"></i>
                        <p>My Orders</p>
                    </a>
                </li>
                <li class="{{ Request::is('myexpense','edit-expense/*','create-expense')? 'active' : '' }}">
                    <a href="/myexpense">
                        <i  class="fa fa-usd text-warning"></i>
                        <p>My Expenses</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="javascript:;">Dashboard </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-magnify" href="javascript:;">
                                <i class="nc-icon nc-layout-11"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown new-order">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-bell-55"></i>
                                <p>
                                    <span class="badge badge-link text-danger    notif-count" data-count="8">8</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right newor" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item text-danger" href="#">


                                            There is a new order

                                    </a>
                            </div>
                        </li>
{{--                                                <li class="nav-item">--}}
{{--                                                    <a class="nav-link btn-rotate" href="javascript:;">--}}
{{--                                                        <i class="nc-icon nc-settings-gear-65"></i>--}}
{{--                                                        <p>--}}
{{--                                                            <span class="d-lg-none d-md-block">Account</span>--}}
{{--                                                        </p>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-settings-gear-65"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/deliverer/profile">My account</a>
                                <a class="dropdown-item">Edit my account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="content">
            @yield('content')
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">

                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js/toastr.min.js')}}"    ></script>
    <script src="{{asset('assets/js/admin_script.js')}}"></script>


    <script>

    </script>
@yield('scripts')

</html>
