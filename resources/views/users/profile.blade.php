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

<!-- Team page start -->
<div class="team-page content-area">
    <div class="container">
        <!-- Heading -->
        <h1 class="heading-2">Profile Details</h1>
        @if (session('edit-success'))
          <div class="alert alert-success" role="alert">
              {{ session('edit-success')}}
          </div>
        @endif
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
        </div>

    </div>
</div>
<!-- Team page end -->
    @endsection
