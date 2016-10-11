@extends('layouts.app')

@section('title', 'Random User Generator')
@section('header')
    <link href="/css/random_user.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row container">

        <form class="form-horizontal" method="POST" action="{{ url('/random_user_generator') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <div class="form-group">
                    <!-- Inputs get duplicated id's and names, because of the labels and $_POST array.-->
                    <label for="number-of-users" class="col-lg-3 control-label">How many users? (Max {{ $MAX_NUM_USERS }})</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" id="number-of-users" name="number-of-users"
                               min="{{ $MIN_NUM_USERS }}" max="{{ $MAX_NUM_USERS }}" value="{{ $numberOfUsers }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <input class="btn btn-primary" type="submit" value="Generate">
                    </div>
                </div>
            </fieldset>

            <!-- Print out form errors if they exist, would have preferred to do this around each input.-->
            @if(isset($error))
                <section>
                    <h3>Form error</h3>
                    <div class="alert alert-danger">
                        <strong>{{ $error }}</strong>
                    </div>
                </section>
            @endif
        </form>
    </div>

    @if (isset($users))
        @foreach($users as $user)
            <div class="row container">
                {{--Snippet based off of: http://bootsnipp.com/snippets/featured/profile-card--}}
                <div class="card hovercard">
                    <img class="cardheader img-responsive" alt="" src={{$user->getCoverPictureURL()}}>
                    <div class="avatar">
                        <img alt="" src={{$user->getProfilePictureURL()}}>
                    </div>

                    <div class="info">
                        <div class="title">{{ $user->getFullName() }}</div>
                        <div class="desc"><i class="fa fa-user" aria-hidden="true"></i> {{ $user->getUserName() }}</div>
                        <div class="desc"><i class="fa fa-unlock-alt" aria-hidden="true"></i> {{ $user->getPassword() }}</div>
                        <div class="desc"><i class="fa fa-envelope" aria-hidden="true"></i> {{ $user->getEmail() }}</div>
                        <div class="desc"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $user->getBirthDate() }}</div>
                        <div class="desc"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $user->getStreetAddress() }}</div>
                        <div class="desc"><i class="fa fa-mobile" aria-hidden="true"></i> {{ $user->getPhoneNumber() }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection

