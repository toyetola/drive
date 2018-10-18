<!DOCTYPE html>
<html lang="en">
@include('header.headerassets')
<body class="layout-horizontal menu-auto-hide">
<div class="container">
    <form class="sign-in-form" action="/performLogin" method="post">
        {{csrf_field()}}
        <div class="card">
            <div class="card-body">
                <a href="" class="brand text-center d-block m-b-20">
                    <img src="{{asset('img/logo.png')}}" alt="Newage Logo" /> <h2 style="font-weight: bolder; color: #1091bf">Drive</h2>
                    {{--<div><h2 style="font-weight: bolder">Drive</h2></div>--}}
                </a>
                <h5 class="sign-in-heading text-center m-b-20">Sign in to your account</h5>
                @include('includes.messages')
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Username</label>
                    <input type="text" id="inputEmail" class="form-control" placeholder="Username" required="" name="username">
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                </div>
                {{--{{bcrypt('secret')}}--}}
                <div class="checkbox m-b-10 m-t-20">
                    <div class="custom-control custom-checkbox checkbox-primary form-check">
                        <input type="checkbox" class="custom-control-input" id="stateCheck1" checked="">
                        <label class="custom-control-label" for="stateCheck1">	Remember me</label>
                    </div>
                    <a href="auth.forgot-password.html" class="float-right">Forgot Password?</a>
                </div>
                <button class="btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Sign In</button>
                {{--<p class="text-muted m-t-25 m-b-0 p-0">Don't have an account yet?<a href="auth.register.html"> Create an account</a></p>--}}
            </div>

        </div>
    </form>
</div>

<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
<script src="{{asset('vendor/modernizr/modernizr.custom.js')}}"></script>
<script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/js-storage/js.storage.js')}}"></script>
<script src="{{asset('vendor/js-cookie/src/js.cookie.js')}}"></script>
<script src="{{asset('vendor/pace/pace.js')}}"></script>
<script src="{{asset('vendor/metismenu/dist/metisMenu.js')}}"></script>
<script src="{{asset('vendor/switchery-npm/index.js')}}"></script>
<script src="{{asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- ================== GLOBAL APP SCRIPTS ==================-->
<script src="{{asset('js/global/app.js')}}"></script>

</body>
</html>