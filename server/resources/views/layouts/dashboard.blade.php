<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Disporapar - @yield('title')</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/SI.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/SI.png">
    <link href="/app-assets/fonts/fonts.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/line-awesome/css/line-awesome.min.css">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/app.min.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/selects/select2.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    @yield('style')
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark bg-info">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu font-large-1"></i>
                        </a>
                    </li>
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="#">
                            <img class="brand-logo" alt="modern admin logo" src="/app-assets/images/ico/default.png">
                            <h4 class="brand-text">Admin Panel</h4>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block float-right">
                        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                            <i class="toggle-icon font-medium-3 white ft-toggle-left" data-ticon="ft-toggle-right"></i>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                            <i class="la la-ellipsis-v"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item nav-search">
                            <a class="nav-link nav-link-search" href="#">
                                <span class="user-name d-md-none">{{ Auth::user()->name }}</span>
                            </a>
                            <!--<div class="search-input">-->
                            <!--    <input class="input" type="text" placeholder="Explore Modern...">-->
                            <!--</div>-->
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item my-user-dropdown">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">
                                    <span class="user-name text-bold-700">{{ Auth::user()->name }}</span>
                                </span>
                                <span class="avatar avatar-online">
                                    <img src="/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar">
                                    <i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right my-user-dropdown">
                                <a class="dropdown-item" href="/logout">
                                    <i class="ft-log-out"></i> Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item menu-navigasi">
                    <a href="/dashboard">
                        <i class="la la-home"></i>
                        <span class="menu-title">Home</span>
                    </a>
                </li>
                <li class="nav-item has-sub">
                    <a href="#">
                        <i class="la la-users"></i>
                        <span class="menu-title">Manajemen User</span>
                    </a>
                    <ul class="menu-content" style="">
                        @if(Auth::user()->super_admin == true)
                        <li class="nav-item menu-navigasi">
                            <a href="/internal">
                                <span class="menu-title">Internal Disporapar</span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item menu-navigasi">
                            <a href="/eksternal">
                                <span class="menu-title">Eksternal / Stakeholder</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-sub">
                    <a href="#">
                        <i class="la la-database"></i>
                        <span class="menu-title">Data Bidang</span>
                    </a>
                    <ul class="menu-content" style="">
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-hotel">
                                <span class="menu-title">Hotel</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-guesthouse">
                                <span class="menu-title">Guest House</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-wisma">
                                <span class="menu-title">Wisma</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-kost">
                                <span class="menu-title">Kos-Kosan</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-resto">
                                <span class="menu-title">Resto</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-rumah-makan">
                                <span class="menu-title">Rumah Makan</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-catering">
                                <span class="menu-title">Catering</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-cafe">
                                <span class="menu-title">Cafe</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-warung">
                                <span class="menu-title">Warung</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-kantin">
                                <span class="menu-title">Kantin</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-kedai">
                                <span class="menu-title">Kedai</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-depot">
                                <span class="menu-title">Depot</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-pub">
                                <span class="menu-title">Pub & Bar</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-agent">
                                <span class="menu-title">Agent</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-biro">
                                <span class="menu-title">Biro</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-bioskop">
                                <span class="menu-title">Bioskop</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-impresariat">
                                <span class="menu-title">Impresariat</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-salon">
                                <span class="menu-title">Pusan Kesehatan & Salon</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-arena">
                                <span class="menu-title">Arena Ketangkasan</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-kebugaran">
                                <span class="menu-title">Panti Kebugaran</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-karaoke">
                                <span class="menu-title">Karaoke</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/databidang-billyard">
                                <span class="menu-title">Billyard</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-navigasi">
                    <a href="/pad">
                        <i class="la la-table"></i>
                        <span class="menu-title">Data PAD Sektor Pariwisata</span>
                    </a>
                </li>
                <li class="nav-item has-sub">
                    <a href="#">
                        <i class="la la-certificate"></i>
                        <span class="menu-title">Data Sertifikasi</span>
                    </a>
                    <ul class="menu-content" style="">
                        <li class="nav-item menu-navigasi">
                            <a href="/admin/admins">
                                <span class="menu-title">Sertifikasi Usaha</span>
                            </a>
                        </li>
                        <li class="nav-item menu-navigasi">
                            <a href="/admin/users">
                                <span class="menu-title">Sertifikasi Profesi</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                @yield('content-header')
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPasswordModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header btn-info white">
                    <h4 class="modal-title white">Ubah kata sandi</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" id="editPasswordForm" method="post">
                    <div class="modal-body">
                        @csrf
                        @METHOD('PUT')
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Masukkan password" class="form-control" id="editPassword" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-outline-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020, All rights reserved. </span>
            <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with
                <i class="ft-heart pink"></i>
            </span>
        </p>
    </footer>
    <!-- BEGIN VENDOR JS-->
    <script src="/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>
    <script src="/app-assets/js/scripts/extensions/toastr.min.js" type="text/javascript"></script>
    <script src="/app-assets/data/jvector/visitor-data.js" type="text/javascript"></script>
    <!-- <script src="/ckeditor/ckeditor.js"></script> -->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="/app-assets/js/core/app.min.js" type="text/javascript"></script>
    <script src="/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    @if(session('OK'))
    <script>
        toastr.success('{{ session("OK") }}', 'Success!');
    </script>
    @endif
    @if(session('ERR'))
    <script>
        toastr.error('{{ session("ERR") }}', 'Error!');
    </script>
    @endif
    <script>
        let token = $("meta[name='_token']").attr("content");
        console.log(token);
        let apiBaseUrl = "{{ url('/') }}/api";

        $(document).ready(function() {
            // get current URL path and assign 'active' class
            console.log(apiBaseUrl);
            let pathname = window.location.pathname;
            $('.nav-item a[href="' + pathname + '"]').parent().addClass('active');

        });

        $(document).on("click", ".editPasswordButton", function() {
            let id = $(this).val();
            $.ajax({
                method: "GET",
                url: "{{ route('user.index') }}/" + id + "/edit"
            }).done(function(response) {
                console.log(response);
                $("#editPasswordForm").attr("action", "/user/" + id)
                $("#editPasswordModal").modal();
            })
        });

        let datatable = $(".datatable");
        if (datatable != null) {
            $(".datatable").DataTable({
                "scrollX": true
            });
        }

        $("form").on("submit", function() {
            $(".modal").modal('hide');
        });
    </script>
    @yield('script')
    <!-- END PAGE LEVEL JS-->

</body>

</html>