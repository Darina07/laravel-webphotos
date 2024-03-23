@extends('layouts')
    @section('content')
        <!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>{{ auth()->user()->name }}</h1>
            <ul class="breadcrumbs">
                <li><a href="/profile/pic">Upload Picture / </a></li>
                <li><a href="/profile/edit">Edit </a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Upload Photo -->
<div class="team-page content-area">
    <div class="container">
        <!-- Heading -->
        <h1 class="heading-2">Profile Details</h1>
        <div class="row">
            <div class="col-lg-8">
                <div class="row g-0 team-2 mb-50">
                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-12">
                        <div class="photo">
                            <img src="{{asset('storage/' . $user->image_path) ?? asset('img/avatar/avatar-11.png')}}" alt="avatar-9" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-8 col-sm-12 align-self-center bg">
                        <div class="detail">
                            <h4>
                                {{ auth()->user()->name }}
                            </h4>
                            <div class="contact">
                                <ul>
                                    <li>
                                        <i class="flaticon-mail"></i><a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-right">
                    <!-- Upload Photo -->
                    <div class="contact-1 financing-calculator widget widget-3">
                        <h3 class="sidebar-title">Upload Photo</h3>
                        @if($photoCount >= 10)
                            <div class="alert alert-danger" role="alert">
                                You have reached the maximum number of photos to upload.
                            </div>
                        @else
                        <form action="/profile/upload" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="photo" class="form-control" placeholder="Phone Number" aria-label="Photo">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-4 btn-lg">ADD</button>
                            </div>
                        </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        @if(session('pic-success'))

        <!-- Last User Photos -->
        <div class="related-car">
            <h3 class="heading-2">Picture</h3>
            <div class="row">
                @if (session('pic-success'))
                  <div class="alert alert-success" role="alert">
                      {{ session('pic-success')}}
                  </div>
                @endif
                <div class="featured-slider slide-box-btn slider" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <div class="slide slide-box">
                        <div class="car-box">
                            <div class="car-thumbnail">
                                <a href="" class="car-img">
                                    <img class="d-block w-100" src="{{ asset('storage/' . $lastCreatedPhoto->image_path) }}" alt="car">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif
<!-- Last User Photos -->
    </div>
</div>
<!-- Upload Picture -->
    @endsection
