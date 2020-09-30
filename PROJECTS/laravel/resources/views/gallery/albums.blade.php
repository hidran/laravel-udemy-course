@extends('templates.default')
@section('content')
    <div class="card-deck">
        @foreach($albums as $album)
            <div class="card">
              
                   <a href="{{route('gallery.album.images', $album->id)}}"> <img  width="200"  class="card-img-top" title="{{$album->description}}"  src="{{asset($album->path)}}"
                                                                                  alt="{{$album->album_name}}"></a>
               
                <div class="card-block">
                    <h4 class="card-title">
                        <a href="{{route('gallery.album.images', $album->id)}}">       {{$album->album_name}}</a>
                    </h4>
                   
                    <p class="card-text">
                        Cats:
                        @foreach($album->categories as $cat)
                          <a href="{{route('gallery.album.category',$cat->id)}}">{{$cat->category_name}}</a>
                            @endforeach
                    </p>
                </div>
            </div>
                @endforeach
           
    </div>
@endsection