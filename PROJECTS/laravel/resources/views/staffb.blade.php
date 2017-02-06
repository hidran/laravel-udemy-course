@extends('templates.default')
@section('title',  $title )

@section('content')
<h1>
    {{$title}}
</h1>


@if($staff)
   <ul>
    @foreach ($staff as $person)

        <li> {{$person['name']}}   {{$person['name']}} </li>
    
    @endforeach
   </ul>
@endif
    @endsection