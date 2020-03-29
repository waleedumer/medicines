@extends('layouts.login')

@section('content')
<div class="flex-center position-ref full-height">

<!-- <div class="content"> -->
<section class="login-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 login-sec">
                            <div class="login-logo text-center">
                                <img src="https://www.mibluemedical.com/cr/wp-content/uploads/2016/04/Logo.png">
                            </div>
                            <h2 class="text-center">Login Now</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Email') }}" type="email" name="email"
                                        value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" placeholder="{{ __('Password') }}" type="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="">
                                    <button type="submit" class="btn w-100 btn-login">Submit</button>
                                </div>

                            </form>
                            <div class="copy-text"><a href="https://magicsalt.co">Magic Salt</a> <i class="far fa-copyright"></i>  2018 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</section>

<!-- </div> -->
</div>
@endsection
