@extends('layouts.app')

@section('title', 'Random User Generator')
@section('header')
    <link href="/css/random_user.css" rel="stylesheet">
@endsection

@section('content')


    <div class="row container">
        @if ($users)
            @foreach($users as $user)
                <div class="card hovercard">
                    {{--Request a different background image per user--}}
                    <img class="cardheader" alt="" src={{$user->getCoverPictureURL()}}>
                    <div class="avatar">
                        {{--Request a different random image per user--}}
                        <img alt="" src={{$user->getProfilePictureURL()}}>
                    </div>

                    <div class="info">
                        <div class="title">{{ $user->getName() }}</div>
                        <div class="desc">{{ $user->getEmail() }}</div>
                        <div class="desc">{{ $user->getBirthDate() }}</div>
                        <div class="desc">{{ $user->getStreetAddress() }}</div>
                        <div class="desc">{{ $user->getPhoneNumber() }}</div>
                    </div>
                </div>
            @endforeach
        @endif



    </div>
@endsection

