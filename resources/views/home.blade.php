@extends('layouts')
    @section('content')
<!-- Last Photos -->
<div class="featured-car comon-slick content-area">
    <div class="container">
           @if(session('signin-message'))
                <div class="alert alert-success" role="alert">
                    Hello {{auth()->user()->name}}!
                </div>
          @endif
        <!-- Main title -->
        <div class="main-title">
            <h1>Latest <span>Photos</span></h1>
            <p>10 most recently uploaded photos by different users.</p>
            @if(!$recentPhotos->count())
                <div class="alert alert-warning" role="alert">
                        There are no any photos.
                </div>
            @endif
        </div>

        <div class="slick row " data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            @foreach ($recentPhotos as $photo)
            <div class="item">
                <div class="car-box bg">
                    <div class="">
                        <a href="/photos/{{$photo->id}}" class="car-img">
                            <img class="d-block" src="{{ asset('storage/' . $photo->image_path) }}" alt="car" style="height: 200px; margin: 0 auto;" >
                        </a>
                    </div>
                </div>
            </div>
@endforeach

        </div>
    </div>
</div>
<!-- Last Photos -->

@if (Auth::guest())
<!-- Login section start -->
<div class="" style="position: relative;text-align: center;display: -webkit-box;display: -moz-box;display: -ms-flexbox;
  display: -webkit-flex;display: flex;justify-content: center;align-items: center;padding: 15px 0;background: #FAFAFA;">
    <div class="container-fluid">
        <div class="row login-box">
            <div class="col-lg-6 pad-0 form-section">
                <div class="form-inner">
                    <h3>Create an account</h3>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-group clearfix">
                            <input name="name" type="text" class="form-control" placeholder="Full Name" aria-label="Full Name" value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group clearfix">
                            <input name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" value="{{old('email')}}">
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group clearfix">
                            <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" value="{{old('password')}}">
                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" class="btn btn-lg btn-4 btn-primary">Register</button>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-6 bg-color-15 pad-0 form-section ">
                <div class="info clearfix">
                    <div class="form-inner">
                    <h3>Sign into your account</h3>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-group clearfix">
                            <input name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group clearfix">
                            <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password">
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" class="btn btn-lg btn-4 btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login section end -->
@endif

    @endsection
