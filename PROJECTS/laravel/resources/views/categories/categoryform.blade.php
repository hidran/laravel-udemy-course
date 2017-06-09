<div class="row">
    <div class="{{$category->category_name?'col-md-7':'col-md-12'}} mt-2">
        <form action="{{$category->category_name ?route('categories.store'): route('categories.update', $category->id)}}"
              method="POST" class="form-inline">
            {{csrf_field()}}
            {{$category->category_name? method_field('PATCH'):''}}
            <div class="form-group">

                <input value="{{$category->category_name}}" name="category_name" id="category_name" class="form-control"
                       required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" title="SAVE"><span class="fa fa-save fa-fw"></span></button>
            </div>
        </form>
    </div>

    @if($category->category_name)
        <div class="col-md-1  mt-2">
            <form method="post" action="{{route('categories.destroy', $category->id)}}" class="form-inline">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class="btn btn-danger" title="DELETE"><span class="fa fa-minus fa-fw"></span></button>
            </form>
        </div>
    @endif

</div>