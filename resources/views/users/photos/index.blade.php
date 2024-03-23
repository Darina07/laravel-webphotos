@extends('layouts')

@section('content')
    <!-- Photo gallery start -->
    <div class="photo-gallery content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title mt2">
                <h1>Images</h1>
                @if (session('pic-deleted'))
                    <div class="alert alert-success" role="alert">
                        {{ session('pic-deleted')}}
                    </div>
                @endif
            </div>
            <div class=" filter-portfolio">
                <div class="cars d-flex flex-wrap justify-content-center">
                    @if(!$allPhotos->count())
                        <div class="alert alert-warning" role="alert">
                            There are no any photos.
                        </div>
                    @else
                        @foreach($allPhotos as $photo)
                            <a href="/photos/{{$photo->id}}"  class="m-2">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="" class="img-fluid" style="height: 200px;">
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-6 p-4">
            <div class="pagination-wrapper d-flex justify-content-center">
                {{ $allPhotos->links() }}
            </div>
        </div>
    </div>
    <!-- Photo gallery end -->
@endsection
