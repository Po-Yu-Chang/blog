@extends('layouts.master')
@section('title',$title)
    @section('content')
        <h1>{{$title}}</h1>
        @include('components.validationErrorMessage')
        <form method="post" action="{{action('UserAuthController@signInProcess')}}">
            <label>
                Email:<input type="text" name="email" placeholder="Email" value="{{old('email')}}">
            </label>
            <label>
                password:<input type="password" name="password" placeholder="password">
            </label>
            <button type="submit">login</button>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
        @endsection