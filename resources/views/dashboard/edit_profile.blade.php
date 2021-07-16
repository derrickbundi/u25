@extends('layouts.dashboard.main')
@section('title', 'Edit Account')
@section('body')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Account</h2>
                <hr>
                <form action="{{ route('update_account', base64_encode(auth()->user()->id)) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="fname" value="{{ $user->fname }}" class="form-control"
                                style="height:45px" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="lname" value="{{ $user->lname }}" class="form-control"
                                style="height:45px" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                style="height:45px" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <small>Mobile</small>
                            <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control"
                                style="height:45px">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <small>ID Number</small>
                            <input type="text" name="id_no" value="{{ $user->id_no }}" class="form-control" style="height:45px">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <small>Password</small>
                            <input type="password" name="password" id="password" class="form-control"
                                style="height:45px" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <small>Confirm Password</small>
                            <input type="password" id="c_password" class="form-control" style="height:45px" required>
                        </div>
                    </div>
                    <span id="form-bar"></span>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url()->previous() }}">
                                <button type="button" class="btn btn-outline-warning btn-block"
                                    style="height: 45px;">Back</button>
                            </a>
                        </div>
                        <div class="d-md-none"><br></div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-block" id="check" style="height: 45px;"
                                type="submit">EDIT ACCOUNT</button>
                        </div>
                    </div>
            </div>
            <form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script>
    $(function () {
        $("#check").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#c_password").val();
            if (password != confirmPassword) {
                $('#form-bar').html('Opps, Password do not match!').css('color', 'red');
                return false;
            }
            return true;
        });
    });
</script>
@endsection