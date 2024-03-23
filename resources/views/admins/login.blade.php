@extends('layouts')
    @section('content')
        <!-- Login section start -->
<div class="login-section">
    <div class="container-fluid">
        <div class="row login-box">
            <div class="col-lg-6 pad-0 form-section">
                <div class="form-inner">
                    <h3>Sign into your ADMIN account</h3>
                    <form action="/admin/login" method="POST">
                        @csrf
                        <div class="form-group clearfix">
                            <input name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" value="{{old('email')}}">
                        </div>
                        <div class="form-group clearfix">
                            <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" value="{{old('password')}}">
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" class="btn btn-lg btn-4 btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 bg-color-15 pad-0 none-992 bg-img">
                <div class="info clearfix">
                    <h1>Welcome to your<span>Admin Panel</span></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login section end -->
    @endsection
