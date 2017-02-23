@extends('templates.default')
@section('content')
    <h1>ALBUMS</h1>
    <ul class="list-group">
    @foreach($albums as $album)
      <li class="list-group-item justify-content-between">
         ({{$album->id}})  {{$album->album_name}} 
          <a href="/albums/{{$album->id}}/delete" class="btn btn-danger">DELETE</a> 
      </li>  
    @endforeach
    </ul>
@endsection
@section('footer')
    @parent
    <script>
       $('document').ready(function () {
           $('ul').on('click', 'a',function (ele) {
               ele.preventDefault();
              
             var urlAlbum =   $(this).attr('href');
             var li = ele.target.parentNode;
             $.ajax(
                 urlAlbum,
                 {
                     complete : function (resp) {
                         console.log(resp);
                       if(resp.responseText == 1){
                           alert(resp.responseText)
                           li.parentNode.removeChild(li);
                          // $(li).remove();
                       } else {
                           alert('Problem contacting server');
                       }
                     }
                 }
             )
           });
       });
    </script>
    @endsection
