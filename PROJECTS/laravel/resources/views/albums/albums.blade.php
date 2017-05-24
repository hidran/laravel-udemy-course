@extends('templates.default')
@section('content')
 
    <h1>ALBUMS</h1>
    @if(session()->has('message'))
       @component('components.alert-info')
        {{session()->get('message')}}
        @endcomponent
        @endif
    <form>
    <input type="hidden" name="_token" id="_token"    value="{{csrf_token()}}">
    
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Album name</th>
            <th>Thumb</th>
            <th>Creator</th>
            <th>Created Date</th>
            <th>Categories</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
  
    @foreach($albums as $album)
       <tr>
         <td> ({{$album->id}})  {{$album->album_name}} {{
             $album->photos_count
             }} pictures</td>
           <td>
          @if($album->album_thumb)
              <img width="120" src="{{asset($album->path)}}" title="{{$album->album_name}}" alt="{{$album->album_name}}">

          @endif
           </td>
           <td>{{$album->user->fullname}}</td>
           <td>
               @if($album->categories)
               <ul>
               @foreach($album->categories as $category)
                    <li>{{$category->category_name}} ({{$category->id}} )</li>
                   @endforeach
               </ul>
               @else
                   No categories bound
               @endif
           </td>
           <td>{{$album->created_at->format('d/m/Y H:i')}}</td>
         <td>
             <a title="Add picture" href="{{route('photos.create')}}?album_id={{$album->id}}" class="btn btn-success">
                 <span class="fa fa-plus-square-o"></span>
             </a>
             @if($album->photos_count)
             <a title="View Images" href="{{route('album.getimages',$album->id)}}" class="btn btn-default">
                 <span class="fa fa-search"></span>
             </a>
             @endif
          <a title="update album" href="{{route('album.edit', $album->id)}}" class="btn btn-primary">
              <span class="fa fa-pencil"></span></a>
          <a title="Delete album" href="{{route('album.delete',$album->id)}}" class="btn btn-danger">
              <span class="fa fa-minus"></span></a>
         </td>
        
      </tr>  
    @endforeach
        <tr>
        <td class="row" colspan="5">
            <div class="col-md-8 push-2">
                {{$albums->links('vendor.pagination.bootstrap-4')}}
            </div>
        </td>
        </tr>
    
    </table>
    </form>
@endsection
@section('footer')
    @parent
    <script>
       $('document').ready(function () {
        
          $('div.alert').fadeOut(5000);
       
           $('table').on('click', 'a.btn-danger',function (ele) {
             alert('kk')
               ele.preventDefault();
              
             var urlAlbum =   $(this).attr('href');
             var li = ele.target.parentNode.parentNode;
             $.ajax(
                 urlAlbum,
                 {
                     method: 'DELETE',
                     data : {
                         '_token' : $('#_token').val()
                     },
                     complete : function (resp) {
                         console.log(resp);
                       if(resp.responseText == 1){
                         //  alert(resp.responseText)
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
