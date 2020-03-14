@extends('layouts.login_layout')

@section('content')
<div class="login-container">
    <div class="login-cbiev-logo">
        <a href="https://www.tarc.edu.my/cbiev/" target="_blank">
            <img src="{{URL::asset('storage/images/logo/taruc.png')}}">
        </a>
    </div>
    <div class="login-ispark-logo">
        <a href="#" target="_blank">
            <img src="{{URL::asset('storage/images/logo/ispark.png')}}">
        </a>
    </div>
    <div class="login-form-box">
        @include('components.login.login_component')
    </div>
    <div class="forgot-password-box">

    </div>
    <div class="disclaimer-box">
        @include('components.disclaimer')
    </div>
</div>
@endsection
