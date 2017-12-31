@extends('templates.admin')
@section('content')
    <h1>Users</h1>
    <table class="table table-striped" id="users-table">
        <thead>
        <tr>
            <th>NAME</th>
            <th>NAME</th>
            <th>NAME</th>
            <th>CREATED AT</th>
            <th>DELETED</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
       
            
        </tbody>
    </table>
    @endsection
@section('footer')
    @parent
    <script>
    $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{route('admin.getUsers')}}',
    columns: [
   
    {data: 'name', name: 'name'},
    {data: 'email', name: 'email'},
    {data: 'created_at', name: 'created'},
    {data: 'deleted_at', name: 'del'},
    {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
    });
    </script>
    @endsection