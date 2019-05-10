<!DOCTYPE html>
<html>

<!-- Mirrored from preview.oklerthemes.com/porto/7.3.0/index-corporate-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Apr 2019 15:23:01 GMT -->

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title') || PPID Kota Padang </title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/img/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ url('assets/template/assets/img/apple-touch-icon.png')}}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ url('assets/template/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/vendor/magnific-popup/magnific-popup.min.css')}}">

    <!-- Admin Extension Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ url('assets/template/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/template/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/template/vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />

    <!-- Admin Extension CSS -->
    <link rel="stylesheet" href="{{ url('assets/template/css/theme-admin-extension.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ url('assets/template/css/theme.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/css/theme-elements.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/css/theme-blog.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/css/theme-shop.css')}}">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ url('assets/template/vendor/rs-plugin/css/settings.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/vendor/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" href="{{ url('assets/template/vendor/rs-plugin/css/navigation.css')}}">

    <!-- Demo CSS -->

    <link rel="stylesheet" href="{{ url('assets/dashboard/css/pnotify.custom.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dashboard/plugins/sweetalert2/sweetalert2.min.css') }}">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ url('assets/template/css/skins/skin-corporate-3.css')}}">
    <script src="{{ url('assets/template/master/style-switcher/style.switcher.localstorage.js')}}"></script>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ url('assets/template/css/custom.css')}}">
    @yield('css')

    <!-- Head Libs -->
    <script src="{{ url('assets/template/vendor/modernizr/modernizr.min.js')}}"></script>
    <link rel="stylesheet" href="{{ url('assets/template/vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />

</head>

<body>
<div class="body">

    <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 148, 'stickySetTop': '-148px', 'stickyChangeLogo': true}">
        <div class="header-body border-color-primary border-top-0 box-shadow-none">

            <div class="header-top header-top-default border-bottom-0 border-top-0">
                <div class="container">
                    <div class="header-row py-2">
                        <div class="header-column justify-content-start">
                            <div class="header-row">
                                <nav class="header-nav-top">
                                    <ul class="nav nav-pills text-uppercase text-2">
                                        <li class="nav-item nav-item-anim-icon">
                                            <a class="nav-link pl-0" href="about-us.html">
                                                <i class="fas fa-angle-right"></i> About Us
                                            </a>
                                        </li>
                                        <li class="nav-item nav-item-anim-icon">
                                            <a class="nav-link" href="contact-us.html">
                                                <i class="fas fa-angle-right"></i> Contact Us
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean">
                                    <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Header-->
            <div class="header-container container z-index-2">
                <div class="header-row py-2">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo header-logo-sticky-change">
                                <a>
                                    <img class="header-logo-sticky opacity-0" alt="Porto" width="270" height="48" data-sticky-width="270px" data-sticky-height="48px" data-sticky-top="87" src="{{ url('assets/img/logo-header.png')}}">
                                    <img class="header-logo-non-sticky opacity-0" alt="Porto" src="{{ url('assets/img/logo-header.png')}}" width="280" height="48">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <ul class="header-extra-info d-flex align-items-center">
                                <li class="d-none d-sm-inline-flex">
                                    <div class="header-extra-info-text">
                                        <label>SEND US AN EMAIL</label>
                                        <strong><a href="mailto:mail@example.com">MAIL@EXAMPLE.COM</a></strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="header-extra-info-text">
                                        <label>CALL US NOW</label>
                                        <strong><a>(+62) 813-6334-7341</a></strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header-->
            <!--Menu Header-->
                <div class="header-nav-bar bg-primary" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'background-color': 'transparent'}" data-sticky-header-style-deactive="{'background-color': '#0088cc'}">
                    <div class="container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-row justify-content-end">
                                    <div class="header-nav header-nav-force-light-text justify-content-start py-2x py-lg-3" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '680px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
                                        <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li class="dropdown dropdown-full-color dropdown-light">
                                                        <a class="dropdown-item dropdown-toggle" href="{{ url('beranda')}}">Beranda</a>
                                                    </li>
                                                    <li class="dropdown dropdown-full-color dropdown-light">
                                                        <a class="dropdown-item dropdown-toggle" href="">Pelayanan Informasi</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="">Daftar Informasi</a>
                                                                @guest
                                                                <a class="dropdown-item" href="{{ url('login')}}">Permohonan Informasi</a>
                                                                @endguest
                                                                @auth('pengguna')
                                                                    <a class="dropdown-item" href="{{ url('permohonan/')}}">Permohonan Informasi</a>
                                                                @endauth
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown dropdown-full-color dropdown-light">
                                                        <a class="dropdown-item dropdown-toggle" href="{{ url('profil')}}">Tentang</a>
                                                    </li>
                                                    <li class="dropdown dropdown-full-color dropdown-light">
                                                        <a class="dropdown-item dropdown-toggle" href="{{ url('login')}}">Masuk</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <button class="btn header-btn-collapse-nav my-2" data-toggle="collapse" data-target=".header-nav-main nav">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </header>


    <!--End Menu Header-->
    @yield('content')
</div>
</body>

<footer id="footer" class="mt-0">
    <div class="container my-4">
        <div class="footer-ribbon">
            <span>Tentang Kami</span>
        </div>
        <div class="row py-5">
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Contact Details</h5>
                <p class="text-4 mb-0">HUMAS dan PROTOKOL PEMKO PADANG </p>
                <p class="text-4 mb-0">Jln. Bagindo Aziz Chan, Aie Pacah Kota Padang, Sumatera Barat.</p>
                <p class="text-4 mb-0">(+62) 813-6334-7341</p>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Social Media</h5>
                <ul class="footer-social-icons social-icons m-0">
                    <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-copyright footer-copyright-style-2 pb-4">
            <div class="py-2">
                <div class="row py-4">
                    <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                        <p>© Copyright 2019. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- Vendor -->
<script src="{{ url('assets/template/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
<script src="{{ url('assets/template/master/style-switcher/style.switcher.js')}}" id="styleSwitcherScript" data-base-path="" data-skin-src=""></script>
<script src="{{ url('assets/template/vendor/popper/umd/popper.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/common/common.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/isotope/jquery.isotope.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/vide/jquery.vide.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/vivus/vivus.min.js')}}"></script>

<!--Datatable-->
<script src="{{ url('assets/template/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js')}}"></script>


<!-- Admin Extension Examples -->
<script src="{{ url('assets/template/js/examples/examples.datatables.default.js')}}"></script>
<script src="{{ url('assets/template/js/examples/examples.datatables.row.with.details.js')}}"></script>
<script src="{{ url('assets/template/js/examples/examples.datatables.tabletools.js')}}"></script>

<!-- Admin Extension -->
<script src="{{ url('assets/template/js/theme.admin.extension.js')}}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ url('assets/template/js/theme.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ url('assets/template/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ url('assets/template/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ url('assets/template/js/views/view.contact.js')}}"></script>

<!-- Theme Custom -->
<script src="{{ url('assets/template/js/custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{ url('assets/template/js/theme.init.js')}}"></script>

<script src="{{ url('assets/template/master/analytics/analytics.js')}}"></script>

<script src="{{ url('assets/dashboard/js/pnotify.custom.js') }}"></script>

<script src="{{ url('assets/dashboard/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ url('assets/dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@yield('jsoperation')

</body>

<!-- Mirrored from preview.oklerthemes.com/porto/7.3.0/index-corporate-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Apr 2019 15:23:07 GMT -->
</html>