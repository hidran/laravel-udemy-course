@extends('templates.default')
@section('content')

<div class="row">
    <div class="col-6 push-2">
       
        <h2>Manage categories</h2>
        @include('categories.categoryform')
    </div>
</div>
@endsection