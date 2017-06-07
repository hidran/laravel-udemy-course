@extends('templates.default')

@section('content')
    @include('partials.inputerrors')
<div class="row">
    <div class="col-7">
    <table class="table table-striped">
        <tr>
     
            <th>ID</th>
            <th>Category name</th>
            <th>Created date</th>
           
             <th>Tot albums</th>
              <th>&nbsp;</th>
        </tr>
        @forelse($categories as $categoryI)
            <tr>
              
                <td>{{$categoryI->id}}</td>
                <td>{{$categoryI->category_name}}</td>
                <td>{{$categoryI->created_at}}</td>
               
                <td>{{$categoryI->albums_count}}</td>
                <td>
                    <form method="post"
                          action="{{route('categories.destroy', $categoryI->id)}}"
                          class="form-inline">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger" title="DELETE"><span class="fa fa-minus"></span></button>&nbsp;
                        <a TITLE="UPDATE" href="{{route('categories.edit',$categoryI->id )}}" class="btn btn-primary"><span class="fa fa-pencil"></span> </a>
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
    </div>
    <div class="col-5">
       <h2>Add  new Category</h2>
       @include('categories.categoryform')
    </div>
</div>
@endsection
