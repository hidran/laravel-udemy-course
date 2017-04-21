@extends('templates.default')
@section('content')
    <h1>New Album</h1>
    @include('partials.inputerrors')
    <form action="{{route('album.save')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
      
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" required name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Album name">

        </div>
        @include('albums.partials.fileupload')
        <div class="form-group">
            <label for="">Description</label>
            <textarea required name="description" id="description" class="form-control" placeholder="Album description">{{old('description')}}</textarea>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
