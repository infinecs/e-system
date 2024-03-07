@extends('layout.appGuest')
@section('content')
 
 <!-- main  -->
 <div class="nk-main">
    <div class="nk-wrap align-items-center justify-content-center has-mask">
        <div class="mask mask-3"></div><!-- .mask-->
        <div class="container p-2 p-sm-4">
            <div class="row flex-lg-row-reverse">
                <div class="col-lg-5">
                    <div class="card card-gutter-lg rounded-4 card-auth">
                        <div class="card-body">
                            <div class="brand-logo mb-4 d-flex justify-content-center">
                                <a href="./html/index.html" class="logo-link">
                                    <div class="logo-wrap ">
                                        <img class="logo-img logo-light" src="{{asset('images/logo/infinecs-logo.png')}}" srcset="{{asset('images/logo/infinecs-logo.png')}}" alt="">
                                        <img class="logo-img logo-dark" src="{{asset('images/logo/infinecs-logo.png')}}" srcset="{{asset('images/logo/infinecs-logo.png')}}" alt="">
                                        <img class="logo-img logo-icon" src="{{asset('images/logo/infinecs-logo.png')}}" srcset="{{asset('images/logo/infinecs-logo.png')}}" alt="">

                                    </div>
                                </a>
                            </div>
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title mb-1">Reset password</h3>
                                    <p class="small">If you forgot your password, don't worry! we’ll email you instructions to reset your password.</p>
                                </div>
                            </div>
                            <form action="{{url('/forgotPassword')}}" method="post">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-12">

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @elseif(session('success'))
                                            <div class="alert alert-success">
                                                <ul>
                                                    <li>{{session('success')}}</li>
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="username" class="form-label">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="email" id="username" value="{{ old('email') }}" placeholder="Enter username">
                                            </div>
                                        </div><!-- .form-group -->
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">Reset Password</button>
                                        </div>
                                    </div>
                                </div><!-- .row -->
                            </form>
                            <div class="text-center mt-4">
                                <p class="small"><a href="/">Back to Login</a></p>
                            </div>
                        </div><!-- .card-body -->
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-lg-7 align-self-center">
                    <div class="card-body is-theme ps-lg-4 pt-5 pt-lg-0">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="h1 title mb-3">Welcome to<br> Infinecs E-Learning System</div>
                                <p>Lorem Ipsum</p>
                            </div>
                        </div><!-- .row -->
                        
                    </div><!-- .card-body -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
</div> <!-- .nk-main -->

@endsection