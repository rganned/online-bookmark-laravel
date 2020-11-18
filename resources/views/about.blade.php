@extends('layouts.app')

@section('page_title', 'About')

@section('content')
<div id="single" class="mt-5">
    <div class="container">
        <div class="sections">
            <img src="{{ asset('dashboard/assets/img/logo_purple.png') }}" alt="" class="mb-5">
            <section class="mb-5">
                <h5>About Us</h5>
                <p>This web application started as a hobby and evolved into a project. Not for profit. In case of any errors, you can contact by email or twitter.</p>
                <p>Twitter: <a href="https://twitter.com/waithzer" target="_blank">twitter.com/waithzer</a></p>
                <p>E-Mail: <a href="mailto:waithzer@gmail.com" target="_blank">waithzer@gmail.com</a></p>
            </section>
            <section class="mb-5">
                <h5>Web Development</h5>
                <p>This software was developed by Ahmet (<a href="https://twitter.com/waithzer" target="_blank">twitter.com/waithzer</a>).</p>
            </section>
            <section class="mb-5">
                <h5>UI/UX Design</h5>
                <p>This application design was made by Fatih (<a href="https://twitter.com/sukubidubiduu" target="_blank">twitter.com/sukubidubiduu</a>) and Ahmet (<a href="https://twitter.com/waithzer" target="_blank">twitter.com/waithzer</a>).</p>
            </section>
            <hr>
            <div class="links my-5">
                <a href="{{route('index')}}" class="mr-4">Home</a>
                <a href="{{route('about')}}" class="mr-4">About</a>
                <a href="{{route('login')}}" class="mr-4">Login</a>
                <a href="{{route('register')}}">Create a account</a>
            </div>
        </div>
    </div>
</div>
@endsection