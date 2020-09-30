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

        <div class="card-group">
            @foreach($albums as $album)
                <div class="col-lg-3 col-md-4">
                @include('albums.partials.album')
                </div>
                  
            @endforeach
        </div>
                <div class="row">
                    <div class="col-md-8 push-2">
                        {{$albums->links('vendor.pagination.bootstrap-4')}}
                    </div>
                </div>
         
       
    </form>
@endsection
@section('footer')
    @parent
    <script>
      $('document').ready(function () {

        $('div.alert').fadeOut(5000);

        $('ul').on('click', 'a.btn-danger',function (ele) {
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
