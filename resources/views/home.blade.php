@extends('layouts.app')

@section('title', 'Developer\'s Best Friend')

@section('content')
    <ul>
        <li><a href="{{ URL::route('lorem_ipsum_generator.index') }}">Lorem Ipsum Generator</a></li>
        <li><a href="{{ URL::route('random_user_generator.index') }}">Random User Generator</a></li>
        <li><a href="{{ URL::route('password_generator.index') }}">Password Generator</a></li>
    </ul>
@endsection