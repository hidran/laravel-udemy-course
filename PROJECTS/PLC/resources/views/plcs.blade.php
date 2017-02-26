@extends('templates.default')
@section('content')
<table class="table table-responsive">
    <tr>
        <th>ID</th>
        <th>PROVINCIA</th>
        <th>PUNTO VENDITA</th>
        <th>IP</th>
       
        <th>DOCUMENTO</th>
        <th>STATO</th>
        <th>AZIONE</th>
    </tr>
    @forelse($plcs as $plc)
        <tr>
            <td>{{$plc->id}}</td>
            <td>{{$plc->address?$plc->address->province_code:null}}</td>
            <td>{{$plc->address?$plc->address->description:null}}</td>
            <td>{{$plc->ip}}</td>
            <td><a href="{{$plc->document?$plc->document->doc_path:null}}" >doc</a></td>
            <td class="{{$plc->state?'green':'red'}}">
                <a class="state" href="/plc/ping/{{$plc->ip}}/{{$plc->port}}">&nbsp;</a>
            </td>
          
        </tr>
      @empty
        Nessun data
        @endforelse
    <tr><td colspan="6">{{$plcs->links('vendor.pagination.bootstrap-4')}}</td> </tr>
</table>

    @endsection
@section('footer')
    @parent
    <script>
        $('document').ready(function () {
          $('.state').click(function (e) {
              e.preventDefault();
              var ele =$( this.parentNode);
              $.ajax({url:this.href}).done(function (res) {
                 if(res*1){
                     alert(res)
                     ele.removeClass('red')
                     ele.addClass('green')
                 } else {
                     ele.removeClass('green')
                     ele.addClass('red')
                 }
              })
          })  
        })
    </script>
    @endsection