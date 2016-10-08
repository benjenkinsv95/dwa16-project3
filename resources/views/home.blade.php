@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="title m-b-md">
        Developer's Best Friend
    </div>

    <div class="links">
        <a href="{{ URL::route('password_generator.index') }}">Password Generator</a>
        <a href="{{ URL::route('lorem_ipsum_generator.index') }}">Lorem Ipsum Generator</a>
        <a href="{{ URL::route('random_user_generator.index') }}">Random User Generator</a>
    </div>
@endsection