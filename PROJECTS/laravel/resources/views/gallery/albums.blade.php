@extends('templates.default')
@section('content')
    <div class="card-deck">
        @foreach($albums as $album)
            <div class="card">
              
                   <a href="{{route('gallery.album.images', $album->id)}}"> <img  width="200"  class="card-img-top" title="{{$album->album_name}}" class="card-img-top" src="{{asset($album->album_thumb)}}"
                                                                                  alt="{{$album->album_name}}"></a>
               
                <div class="card-block">
                    <h4 class="card-title">
                        <a href="{{route('gallery.album.images', $album->id)}}">       {{$album->album_name}}</a>
                    </h4>
                    <p class="card-text">{{$album->description}}</p>
                    <p class="card-text">
                        <small class="text-muted">{{$album->created_at->diffForHumans()}}</small>
                    </p>
                </div>
            </div>
                @endforeach
            </div>
@endsection