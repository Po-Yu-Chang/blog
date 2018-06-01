@extends('layouts.master')
@section('title',$title)
    @section('content')
        <div class="container">
            <h1>{{$title}}</h1>
            <form method="post" action="{{action('UserAuthController@signUpProcess')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <label>
                    暱稱: <input type="text" name="nickname" value="{{old('nickname')}}" placeholder="暱稱">
                </label>
                <label>
                    Email:<input type="text" name="email" value="{{old('email')}}" placeholder="Email">
                </label>
                <label>
                    密碼<input type="password" name="password"  placeholder="密碼">
                </label>
                <label>
                    確認密碼<input type="password" name="password_confirmation" placeholder="確認密碼">
                </label>
                <label>
                    <select name="type">
                        <option value="G">一般會員</option>
                        <option value="A">管理者</option>
                    </select>
                </label>
                <button type="submit">註冊</button>
            </form>
            @endsection
            @include('components.validationErrorMessage')
        </div>