@extends('layouts.adminLayout')
@push('css')
<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('admin/assets/colors/color1.css')}}" />
<link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/style.css')}}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/dark-style.css')}}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/transparent-style.css')}}" rel="stylesheet">
<link href="{{ asset('admin/assets/css/skin-modes.css')}}" rel="stylesheet" />




@endpush


@section('header')
@include('partials.header')
@endsection
@section('content')
 <!-- BACKGROUND-IMAGE -->
 <div class="container-login100">
    <div class="wrap-login100 p-6">
        @include('errors')
        <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
            {{ csrf_field()}}
            <span class="login100-form-title">
                   Log In
                </span>
            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                    <i class="mdi mdi-account" aria-hidden="true"></i>
                </a>
                <input class="input100 border-start-0 ms-0 form-control" name="name" type="text" placeholder="User name">
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
                <input href="index.html" type="submit" name="submit" value="login" class="login100-form-btn btn-primary">


            </div>
            <div class="text-center pt-3">
                <p class="text-dark mb-0">Already have account?<a href="login.html" class="text-primary ms-1">Sign In</a></p>
            </div>
            <label class="login-social-icon"><span>Register with Social</span></label>
            <div class="d-flex justify-content-center">
                <a href="javascript:void(0)">
                    <div class="social-login me-4 text-center">
                        <i class="fa fa-google"></i>
                    </div>
                </a>
                <a href="javascript:void(0)">
                    <div class="social-login me-4 text-center">
                        <i class="fa fa-facebook"></i>
                    </div>
                </a>
                <a href="javascript:void(0)">
                    <div class="social-login text-center">
                        <i class="fa fa-twitter"></i>
                    </div>
                </a>
            </div>
        </form>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection
@section('footer')
@include('partials.footer')
@endsection
@push('js')
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

@endpush
