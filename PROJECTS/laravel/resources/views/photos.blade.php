@extends('templates.default')
@section('content')
    <table class="table table-bordered">
        
   
    @forelse($photos as $photo)
        <tr>
            <td>{{$photo->name}}</td>
            <td>{{$photo->description}}</td>
            <td><img src="{{str_replace([640, 480],'120',$photo->img_path)}}"></td>
        </tr>
        @empty
        <tr><td>No pics</td></tr>
           
        @endforelse
       @if($photos)
            <tr><td>{{$photos->links()}}</td></tr>
           @endif;
    </table>
    @endsection