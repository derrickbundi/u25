@extends('layouts.auth.main')
@section('title', 'Login')
@section('body')
<style>
    #home {
        background: url(new_.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: contain;
    }
</style>
<section class="hero-section ai5 relative" id="home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 offset-md-5">
                <div class="card" style="margin-top:-50px;">
                    <div class="card-header">
                        LOGIN
                        <a href="{{ url()->previous() }}" class="float-right">&nbsp;<<&nbsp;BACK</a>
                    </div>

                    <div class="card-body">
                        @if(session('message'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Email*" style="height:50px;">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password*"
                                        style="height:50px;">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn login-btn btn-block" style="height:42px;">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    Forgot password ? <a href="{{ route('password.request') }}">Recover Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection