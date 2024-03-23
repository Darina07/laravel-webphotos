@extends('layouts')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>Photo Details</h1>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Car details page start -->
    <div class="car-details-page content-area-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="car-details-section">
                        <!-- Heading start -->
                        <div class="heading-car clearfix">
                            <div class="pull-left">
                                <h3>Photo:</h3>
                                @if (session('success-comment'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success-comment')}}
                                    </div>
                                @endif
                                <h6>
                                    <i class="flaticon-pin"></i>Sofia, Bulgaria
                                </h6>
                            </div>
                            <div class="pull-right">
                                <h3><span>Special</span></h3>
                            </div>
                        </div>
                        <div class="product-slider-box clearfix mb-30">
                            <div class="product-img-slide">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" class="img-fluid w-100" alt="slider-car">
                            </div>
                        </div>

                        <h3 class="heading-2">Comments</h3>
                        <!-- Comments start -->
                        <ul class="comments">
                            @if(!$photo->comments->count())
                                <li>
                                    <div class="alert-box mb-50">
                                        <div class="alert alert-primary" role="alert">
                                            There are no comments yet!
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @foreach($comments as $comment)
                                <li>
                                    <div class="comment d-flex mb-3">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="{{asset('img/avatar/avatar-1.png')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h6>
                                                    {{$comment->user->name}}
                                                </h6>
                                            </div>
                                            <p>{{$comment->comment}}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div>
                            @auth
                                @if($commentCount >= 10)
                                    <div class="alert alert-warning" role="alert">
                                        Reached the maximum number of 10 comments for this photo!
                                    </div>
                                @else
                                {{-- Form to add a new comment --}}
                                <form action="{{ route('add-comment', $photo->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="comment">Add Comment:</label>
                                        <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Advanced search start -->
                        <div class="widget advanced-search d-none-992">
                            <h3 class="sidebar-title">Information:</h3>
                            <ul>
                                <li>
                                    <span>User:</span>{{ $photo->user->name }}
                                </li>
                                <li>
                                    <span>Created At:</span>{{ $photo->created_at }}
                                </li>
                            </ul>
                        </div>

                        {{-- Display delete button only if the current user is the author of the photo --}}
                        @auth
                            @if(auth()->user()->id === $photo->user_id)
                                <div class="widget advanced-search d-none-992 text-center">
                                    <form action="{{ route('delete-photo', $photo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-md">DELETE PHOTO</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Properties details page end -->
@endsection
