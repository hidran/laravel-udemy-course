@extends('templates.admin')
@section('content')
    <h1>Users</h1>
    <table class="table table-striped" id="dataTable">
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
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->deleted_at}}</td>
                <td>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-primary  btn-sm" title="UPDATE">
                                <i class="fa fa-pencil-square-o"></i>
                            </button>
                        </div>
                        <div class="col-md-4"> 
                           
                            <button 
                                    @if($user->deleted_at)
                                            disabled
                                    @else
                                            
                                    @endif 
                                            
                                    class="btn btn-danger btn-sm" title="SOFT DELETE">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-danger  btn-sm" title="FORCE DELETE">
                                <i class="fa fa-minus-square-o"></i>
                            </button>
                        </div>
                        
                    </div>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    @endsection