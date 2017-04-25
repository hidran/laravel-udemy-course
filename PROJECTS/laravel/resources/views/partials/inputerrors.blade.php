<?php
/**
 * Created by PhpStorm.
 * User: Hidran Arias
 * Date: 20/04/2017
 * Time: 01:24
 */
?>
@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif