@extends('templates.default')
@section('content')
    <h1>Edit Album</h1>
    @include('partials.inputerrors')
    <form action="{{route('album.patch', $album->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" required name="name" id="name" class="form-control" value="{{old('name', $album->album_name)}}" >

        </div>
      @include('albums.partials.fileupload')
        @include('albums.partials.category_combo')
        <div class="form-group">
            <label for="">Description</label>
            <textarea required name="description" id="description" class="form-control" placeholder="Album description">{{old('description',$album->description)}}</textarea>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('albums')}}"  class="btn btn-default">Back</a>
        <a href="{{route('album.getimages', $album->id)}}"  class="btn btn-success">Album images</a>
    </form>
@stop
