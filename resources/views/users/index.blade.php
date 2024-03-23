@extends('layouts')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>Users</h1>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- users start -->
<div class="our-team content-area">
    <div class="container">
        <div class="row">
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
                            <p class="member-designation">Number of photos: {{ $user->photos_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
            <div class="mt-6 p-4">
                <div class="pagination-wrapper d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- team end -->
@endsection
