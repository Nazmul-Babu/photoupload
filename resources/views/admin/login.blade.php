<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/images/brand/favicon.ico')}}" />

    <!-- TITLE -->
    <title>Admin login</title>

    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('admin/assets/colors/color1.css')}}" />
    <link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/skin-modes.css')}}" rel="stylesheet" />
</head>

<body class="app sidebar-mini ltr login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('admin/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <a href="index.html"><img src="../assets/images/brand/logo-white.png" class="header-brand-img m-0" alt=""></a>
                    </div>
                </div>
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        @include('errors')
                        <form class="login100-form validate-form" method="POST" action="{{ route('Adminlogin')}}">
                            {{ csrf_field()}}
                            <span class="login100-form-title">
									login
								</span>
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="text" name="name" placeholder="User name">
                            </div>

                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" name="password" type="password" placeholder="Password">
                            </div>
                            <label class="custom-control custom-checkbox mt-4">
									<input type="checkbox" class="custom-control-input">
									<span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
								</label>
                            <div class="container-login100-form-btn">
                                <input href="index.html" value="login" type="submit" class="login100-form-btn btn-primary">


                            </div>


                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('admin/assets/js/show-password.min.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('admin/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('admin/assets/js/themeColors.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin/assets/js/custom.js')}}"></script>



</body>

</html>
