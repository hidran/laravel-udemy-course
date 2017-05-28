@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-8">
    <table class="table table-striped">
        <tr>
     
            <th>ID</th>
            <th>Category name</th>
            <th>Created date</th>
            <th>Update date</th>
             <td> Number of albums</td>
      
        </tr>
        @forelse($categories as $category)
            <tr>
              
                <td>{{$category->id}}</td>
                <td>{{$category->category_name}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>{{$category->albums_count}}</td>
            
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
    <div class="col-4">
       <h2>Add  new Category</h2>
        <form action="{{route('categories.store')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="category_name">Category name</label>
                <input name="category_name" id="category_name" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">SAVE</button>
            </div>
        </form>
    </div>
</div>
@endsection
