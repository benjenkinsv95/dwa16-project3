@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>
        Developer's Best Friend
    </h1>

    <ul>
        <li><a href="{{ URL::route('password_generator.index') }}">Password Generator</a></li>
        <li><a href="{{ URL::route('lorem_ipsum_generator.index') }}">Lorem Ipsum Generator</a></li>
        <li><a href="{{ URL::route('random_user_generator.index') }}">Random User Generator</a></li>
    </ul>
@endsection