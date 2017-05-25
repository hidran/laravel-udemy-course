@extends('templates.default')

@section('content')
    <button class="btn btn-primary" data-toggle="modal" data-target="#modal">Large modal</button>
   
    <table class="table table-striped">
        <tr>
            <th><input type="checkbox" id="selall"></th>
            <th>ID</th>
            <th>Category name</th>
            <th>Created date</th>
            <th>Update date</th>
             <td> Number of albums</td>
            <th>&nbsp;</th>
        </tr>
        @forelse($categories as $category)
            <tr>
                <td><input type="checkbox" name="cats[{{$category->id}}]" value="{{$category->id}}"></td>
                <td>{{$category->id}}</td>
                <td>{{$category->category_name}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>{{$category->albums_count}}</td>
                <td>
                    <form method="POST" action="{{route('categories.destroy',$category->id)}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                    <button role="button" href="" class="btn btn-danger btn-sm">DELETE</button>
                    </form>
                </td>
            </tr>
            @empty
            <tfoot>
            <tr><td colspan="5"> No categories</td></tr>
            </tfoot>
       
        @endforelse

         </table>
    
    <div class="row">
    <div class="col-md-8 push-2"> {{$categories->links('vendor.pagination.bootstrap-4')}}</div>
    </div>
@component('partials.modal')
    @slot('title')
        INFO
        @endslot
    <div id="content">Content</div>
    @endcomponent
@endsection
@section('footer')
    @parent
    <script>
      $('document').ready(function () {
        $('#btn-primary').click(function (ele) {
          alert(ele.target.className)
        });
        $('div.alert').fadeOut(5000);

        $('table').on('click', '#selall',function (ele) {
          $('#myModal').modal('show');
         
          console.dir(ele)
          console.log(ele)
           if($(ele.target).prop('checked')){
             $('td input[type=checkbox]').prop('checked', true);
           } else {
             $('td input[type=checkbox]').prop('checked', false);
           }

  
        });
      });
    </script>
    @endsection