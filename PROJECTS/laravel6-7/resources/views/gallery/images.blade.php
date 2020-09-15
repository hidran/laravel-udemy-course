@extends('templates.default')
@section('content')
    <div class="row">
        @foreach($images as $image)
            <div class="col-md-4 col-sm-6 col-lg-2">
                <a href="{{asset($image->img_path)}}" data-lightbox="{{$album->album_name}}">
                    <img  class="img-fluid img-thumbnail" width="250" alt="{{$image->name}}"  src="{{asset($image->img_path)}}"></a>
            </div>
            @endforeach
    </div>
    @endsection
  