@extends('layouts')
    @section('content')
        <!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">

        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Contact 2 start -->
<div class="contact-2 content-area-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Contact <span>Us</span></h1>
        </div>
        <form action="/contacts" method="POST" >
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floating-full-name" placeholder="Full Name" name="name" value="{{old('name')}}">
                                <label for="floating-full-name">Full Name</label>
                                @error('name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floating-email-address" placeholder="Email Address" name="email" value="{{old('email')}}">
                                <label for="floating-email-address">Email address</label>
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a message here" id="floatingTextarea2" name="message"  style="height: 100px">{{old('message')}}</textarea>
                                <label for="floatingTextarea2">Message</label>
                                @error('message')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
                                <button type="submit" class="btn btn-primary btn-4 btn-lg">Send Message</button>
                            </div>
                        </div>
                        @if(session('success-mail-sent'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success-mail-sent')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-info-2">
                        <div class="ci-box d-flex mb-3">
                            <div class="icon">
                                <i class="flaticon-phone"></i>
                            </div>
                            <div class="detail">
                                <h5>Phone:</h5>
                                <p><a href="tel:+359887079256">+359887079256</a></p>
                            </div>
                        </div>
                        <div class="ci-box d-flex  mb-3">
                            <div class="icon">
                                <i class="flaticon-mail"></i>
                            </div>
                            <div class="detail">
                                <h5>Email:</h5>
                                <p><a href="mailto:darina.franktrax@gmail.com">darina.franktrax@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact 2 end -->

    @endsection
