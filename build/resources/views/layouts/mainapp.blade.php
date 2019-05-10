<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ url('assets/dashboard/img/basic/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title') || PPID </title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/pnotify.custom.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dashboard/plugins/sweetalert2/sweetalert2.min.css') }}">

</head>
<body class="light sidebar-mini sidebar-collapse loaded">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
    <aside class="main-sidebar fixed offcanvas b-r sidebar-tabs" data-toggle='offcanvas'>
        <div class="sidebar">
            <div class="d-flex hv-100 align-items-stretch">
                <div class="indigo text-white">
                    <div class="nav mt-5 pt-5 flex-column nav-pills" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical">
                        <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                           aria-controls="v-pills-home" aria-selected="true"><i class="icon-inbox2"></i></a>
                        <a class="nav-link blink skin_handle"  href="#"><i class="icon-lightbulb_outline"></i></a>
                        <a href="">
                            <figure class="avatar">
                                <img src="{{ url('assets/dashboard/img/dummy/u3.png') }}" alt="">
                                <span class="avatar-badge online"></span>
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab">
                        <div class="relative brand-wrapper sticky b-b">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <div class="text-xs-center">
                                    <span class="font-weight-lighter s-18">Menu</span>
                                </div>
                            </div>
                        </div>
                        {{-- Menu di app.blade --}}
                        @yield('menu')
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="relative brand-wrapper sticky b-b p-3">
                            <form>
                                <div class="form-group input-group-sm has-right-icon">
                                    <input class="form-control form-control-sm light r-30" placeholder="Search" type="text">
                                    <i class="icon-search"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <div class="has-sidebar-left">
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                    <div class="search-bar">
                        <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                               placeholder="start typing...">
                    </div>
                    <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
                       aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
                </div>
            </div>
        </div>
    </div>
    <a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 fixed">
        <i></i>
    </a>
    <div class="has-sidebar-left has-sidebar-tabs">
        <!--navbar-->
        <div class="sticky">
            <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
                <div class="relative">
                    <div class="d-flex">
                        <div class="d-none d-md-block">
                            <h1 class="nav-title">Dashboard</h1>
                        </div>
                    </div>
                </div>
                <!--Top Menu Start -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account-->
                        <li class="dropdown custom-dropdown user user-menu ">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <img src="{{ url('assets/dashboard/img/dummy/u8.png') }}" class="user-image" alt="User Image">
                                <i class="icon-more_vert "></i>
                            </a>
                            <div class="dropdown-menu p-4 dropdown-menu-right">
                                <div class="row box justify-content-between my-4">
                                    <div class="col">
                                        <a href="#">
                                            <i class="icon-perm_data_setting indigo lighten-2 avatar  r-5"></i>
                                            <div class="pt-1">Setting</div>
                                        </a>
                                    </div>
                                    <div class="col"><a href="#">
                                            <i class="icon-beach_access pink lighten-1 avatar  r-5"></i>
                                            <div class="pt-1">Profile</div>
                                        </a></div>
                                    <div class="col">
                                        <a href="logout">
                                            <i class="icon-power-off purple lighten-2 avatar  r-5"></i>
                                            <div class="pt-1">Logout</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--#navbar-->
        <div class="container-fluid relative animatedParent animateOnce my-3">
            <div class="row row-eq-height my-3 mt-3">
                <div class="col-lg-12">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Right Sidebar -->
    <div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="{{ url('assets/dashboard/js/app.js') }}"></script>
<script src="{{ url('assets/dashboard/js/pnotify.custom.js') }}"></script>
<script src="{{ url('assets/dashboard/js/inputmask.js') }}"></script>
<script src="{{ url('assets/dashboard/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ url('assets/dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/plugins/mask/dist/jquery.mask.js') }}"></script>
@yield('jsoperation')
</body>
</html>