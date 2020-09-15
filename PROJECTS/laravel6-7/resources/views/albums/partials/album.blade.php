<div class="card">
    <div class="card-header">
       {{$album->album_name}} ({{$album->photos_count}}) images
    </div>
    @if($album->album_thumb)
        <div class="card-img-top">
        <img width="200" height="200"  class="img-fluid img-circle" src="{{asset($album->path)}}" title="{{$album->description}}" alt="{{$album->album_name}}">
        </div>
    @endif
  
    <div class="card-footer">
    
        <a title="Add Pic" href="{{route('photos.create')}}?album_id={{$album->id}}" class="btn   btn-sm btn-primary"><i class="fa fa-plus-square-o"></i></a>
            @if($album->photos_count)
            <a href="{{route('album.getimages',$album->id)}}" class="btn  btn-sm btn-primary"><i class="fa fa-search-plus"></i></a>
                
            @endif
        
            <a  title="Edit album" href="/albums/{{$album->id}}/edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
            <a title="Elimina album" href="/albums/{{$album->id}}" class="btn  btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
      
    </div>
</div>