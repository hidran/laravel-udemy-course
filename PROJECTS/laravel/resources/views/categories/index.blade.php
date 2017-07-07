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
            <tr id="tr-{{$categoryI->id}}">
              
                <td>{{$categoryI->id}}</td>
                <td>{{$categoryI->category_name}}</td>
                <td>{{$categoryI->created_at}}</td>
               
                <td>{{$categoryI->albums_count}}</td>
                <td>
                    <form  method="post" id="form-{{$categoryI->id}}"
                          action="{{route('categories.destroy', $categoryI->id)}}"
                          class="form-inline form-delete">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button id="btnDelete-{{$categoryI->id}}" class="btn btn-danger" title="DELETE"><span class="fa fa-minus"></span></button>&nbsp;
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
@section('footer')
    @parent
    <script>
      $('document').ready(function () {

        $('div.alert').fadeOut(5000);

        $('form .btn-danger ').on('click',function (ele) {
          ele.preventDefault();
          
          var f = this.parentNode;
          var categoryId = this.id.replace('btnDelete-','')*1;
          var Trid ='tr-'+ categoryId;
          var urlCategory = f.action;

        
          $.ajax(
              urlCategory,
            {
              method: 'DELETE',
              data : {
                '_token' : window.Laravel.csrfToken
              },
              complete : function (resp) {
                var response = JSON.parse(resp.responseText);
                alert(response.message);
                if(response.success){
                  //  alert(resp.responseText)
                  $('#'+Trid).fadeOut();
                  // $(li).remove();
                } else {
                  alert('Problem contacting server');
                }
              }
            }
          )
        });
        // add Category ajax
          $('#manageCategoryForm .btn-primary ').on('click',function (ele) {
              ele.preventDefault();

              var f = $('#manageCategoryForm');
              var data  = f.serialize();
              var urlCategory = f.attr('action');   
         

              $.ajax(
                  urlCategory,
                  {
                      method: 'POST',
                      data : data,
                      complete : function (resp) {
                          var response = JSON.parse(resp.responseText);
                          alert(response.message);
                          if(response.success){
                              f.category_name.value = '';
                             f.reset();
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