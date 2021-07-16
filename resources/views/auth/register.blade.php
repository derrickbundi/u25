@extends('layouts.auth.main')
@section('title', 'Register')
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
                <div class="card" style="margin-top:50px;">
                    <div class="card-header">
                        CREATE ACCOUNT
                        <a href="{{ url()->previous() }}" class="float-right">&nbsp;<<&nbsp;BACK</a> </div> <div
                                class="card-body">
                                @if(session('message'))
                                <div class="alert alert-danger">{{ session('message') }}</div>
                                @endif
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">

                                        <div class="col-md-6">
                                            <input id="fname" type="text"
                                                class="form-control @error('fname') is-invalid @enderror" name="fname"
                                                value="{{ old('fname') }}" required autocomplete="fname" autofocus
                                                placeholder="First Name*" style="height:50px;">

                                            @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="d-md-none"><br></div>
                                        <div class="col-md-6">
                                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname"
                                                value="{{ old('lname') }}" required autocomplete="lname" autofocus placeholder="Last Name*" style="height:50px;">
                                        
                                            @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                                value="{{ old('mobile') }}" required autocomplete="mobile" autofocus placeholder="0712345678*" style="height:50px;">
                                        
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="id_no" type="number" class="form-control @error('id_no') is-invalid @enderror" name="id_no"
                                                value="{{ old('id_no') }}" autocomplete="id_no" autofocus placeholder="ID Number (Optional)" style="height:50px;">
                                        
                                            @error('id_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <select name="" id="" class="form-control" style="height: 50px;" name="interest[]">
                                                <option>Select interest</option>
                                                <option>Environment</option>
                                                <option>Talent</option>
                                                <option>Agribusiness</option>
                                                <option>Entrepreneurship</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email*" style="height:50px;">
                                            
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password*" style="height:50px;">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="d-md-none"><br></div>
                                        <div class="col-md-6">
                                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                                required autocomplete="password_confirmation" placeholder="Confirm Password*" style="height:50px;">
                                        
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn login-btn btn-block" style="height:42px;">
                                                {{ __('Create Account') }}
                                            </button>
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