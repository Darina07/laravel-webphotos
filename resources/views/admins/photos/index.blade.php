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
            <div class="filter-portfolio">
                <div class="row justify-content-center">
                    @if(!$photos->count())
                        <div class="alert alert-warning" role="alert">
                            There are no any photos.
                        </div>
                    @else
                        @foreach($photos as $photo)
                            <div class="col-md-4 mb-4">
                                <div class="photo-container">
                                    <img src="{{ asset('storage/' . $photo->image_path) }}" alt="" class="img-fluid" style="height: 200px;">
                                    <a href="/admin/photos/{{$photo->id}}/comments"><p>View Comments</p></a>
                                    <div class="mt-2">
                                        <form method="POST" action="{{ route('admin.photos-delete', ['photo' => $photo->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-md">DELETE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
             <div class="mt-6 p-4">
                <div class="pagination-wrapper d-flex justify-content-center">
                    {{ $photos->links() }}
                </div>
            </div>

        </div>
    </div>
    <!-- Photo gallery end -->
@endsection
