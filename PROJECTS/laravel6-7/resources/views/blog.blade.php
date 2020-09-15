@extends('templates.default')
@section('title','Blog')
@section('content')
    <h1>blog</h1>

    @component('components.card',
    [
    'img_title' =>'Image blog',
    'img_url' => 'http://lorempixel.com/400/200'
    
    ]
    )
    <p> This is a beautiful image I took in New York</p>

    @endcomponent

    @component('components.card')
    @slot('img_url', 'http://lorempixel.com/400/200')
    @slot('img_title', 'Second image')

    <p> This is a beautiful image I took in Panama</p>

    @endcomponent
@endsection
@include('components.card',[
    'img_title' =>'Image blog include',
    'img_url' => 'http://lorempixel.com/400/200'
    
    ] )
@section('footer')
    @parent

@endsection