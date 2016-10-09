@extends('layouts.app')

@section('title', 'Random User Generator')
@section('header')
    <link href="/css/random_user.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        @for ($i = 0; $i < 10; $i++)
            <div class="card hovercard">
                {{--Request a different background image per user--}}
                <img class="cardheader" alt="" src="http://placeimg.com/100{{ $i }}/200/nature">
                <div class="avatar">
                    {{--Request a different random image per user--}}
                    <img alt="" src="http://placeimg.com/20{{ $i }}/200/people">
                </div>
                <div class="info">
                    <div class="title">
                        Random User
                    </div>
                    <div class="desc">fake@email.com</div>
                    <div class="desc">12/3/1973</div>
                    <div class="desc">2842 Colorado Rd</div>
                    <div class="desc">(837)-425-7004</div>
                    <div class="desc">password</div>
                </div>
            </div>
        @endfor
    </div>
@endsection

