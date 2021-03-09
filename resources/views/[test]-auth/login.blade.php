@extends('layouts.master')

@section('content')

    <!--=========login===========-->

    <section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url({{asset('assets')}}/images/login-bg.jpg);" >
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url({{asset('assets')}}/images/login-inner-bg.jpg);">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">Hello world!</h2>
                        <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose responsive template along with powerful features.</p>
                        <ul class="list-unstyled  pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-30">Sign In To Admin</h3>
                        <div class="section-field mb-20">
                            <label class="mb-10" for="name">User name* </label>
                            <input id="name" class="web form-control" type="text" placeholder="User name" name="web">
                        </div>
                        <div class="section-field mb-20">
                            <label class="mb-10" for="Password">Password* </label>
                            <input id="Password" class="Password form-control" type="password" placeholder="Password" name="Password">
                        </div>
                        <div class="section-field">
                            <div class="remember-checkbox mb-30">
                                <input type="checkbox" class="form-control" name="two" id="two" />
                                <label for="two"> Remember me</label>
                                <a href="password-recovery.html" class="float-right">Forgot Password?</a>
                            </div>
                        </div>
                        <a href="#" class="button">
                            <span>Log in</span>
                            <i class="fa fa-check"></i>
                        </a>
                        <p class="mt-20 mb-0">Don't have an account? <a href="register.html"> Create one here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
     login-->

@endsection
