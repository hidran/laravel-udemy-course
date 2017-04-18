@extends('templates.default')
@section('content')
    <h1>New Album</h1>
    <form action="{{route('photos.update', $photo->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$photo->name}}" placeholder="Image name">

        </div>
        <input type="hidden" name="album_id" value="{{$photo->album_id}}">
        @include('images.partials.fileupload')
        <div class="form-group">
            <label for="">Description</label>
            <textarea  name="description" id="description" class="form-control" placeholder="Album description">{{$photo->description}}</textarea>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
