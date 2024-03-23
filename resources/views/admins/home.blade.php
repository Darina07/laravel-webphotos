@extends('layouts')
    @section('content')

        <!-- users start -->
<div class="our-team content-area">
    <div class="container">
        <div class="row">
              <div class="main-title mt2">
                <h1>Last Registered Users</h1>
            </div>
            @if(!$users->count())
                <div class="alert alert-warning" role="alert">
                        There are no any users.
                </div>
            @endif
            @foreach ($users as $user)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="team-4">
                    <div class="member-thumb">
                        <img src="{{$user->image_path ? asset('storage/' . $user->image_path) : asset('img/avatar/avatar-6.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                {{ $user->name }}
                            </h4>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="{{asset('storage/' . $user->image_path) ?? asset('img/avatar/avatar-6.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                {{ $user->name }}
                            </h4>
                            <p class="member-designation">Registered: {{ $user->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</div>
<!-- team end -->

<!-- Featured car start -->
<div class="featured-car comon-slick content-area">
    <div class="container">
        @if (session('loggedin'))
          <div class="alert alert-primary" role="alert">
              Welcome {{auth()->user()->name}}
          </div>
        @endif

        <!-- Main title -->
        <div class="main-title">
            <h1>Latest <span>Photos</span></h1>
            <p>5 most recently uploaded photos by different users.</p>
            @if(!$photos->count())
                <div class="alert alert-warning" role="alert">
                        There are no any photos.
                </div>
            @endif
        </div>

        <div class="slick row " data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            @foreach ($photos as $photo)
            <div class="item">
                <div class="car-box bg">
                    <div class="car-thumbnail">
                        <a href="/" class="car-img">
                            <img class="d-block" src="{{ asset('storage/' . $photo->image_path) }}" alt="car" style="height: 200px; margin: 0 auto;" >
                        </a>
                        <div class="carbox-overlap-wrapper">
                            <div class="overlap-box">
                                <div class="overlap-btns-area">
                                    <div class="car-magnify-gallery">
                                        <a href="{{ asset('storage/' . $photo->image_path) }}" class="overlap-btn" data-sub-html="<h4>Uploaded By: {{$photo->user->name}}</h4>">
                                            <i class="fa fa-expand"></i>
                                            <img class="hidden" src="{{ asset('storage/' . $photo->image_path) }}" alt="hidden-img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            Uploaded by
                        </h1>
                        <div class="location">
                                <i class="flaticon-user"></i> {{ $photo->user->name }}
                        </div>
                    </div>
                </div>
            </div>
@endforeach

        </div>
    </div>
</div>
<!-- Featured car end -->
    @endsection
