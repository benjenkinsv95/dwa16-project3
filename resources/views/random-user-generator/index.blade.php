@extends('layouts.app')

@section('title', 'Random User Generator')
@section('header')
    <link href="/css/random_user.css" rel="stylesheet">

@endsection

@section('content')
    <div class="row container">
        <form class="form-horizontal col-xs-12 col-sm-10 col-md-7 col-lg-6" method="POST" action="{{ url('/random_user_generator') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                @include('forms.form_group', ['id' => 'number-of-users'])
                    <!-- Inputs get duplicated id's and names, because of the labels and $_POST array.-->
                    <label for="number-of-users" class="control-label">How many users? (Max {{ $MAX_NUM_USERS }})</label>
                    <input type="number" class="form-control" id="number-of-users" name="number-of-users"
                           min="{{ $MIN_NUM_USERS }}" max="{{ $MAX_NUM_USERS }}" value='{{ old('number-of-users') }}' placeholder="6" required>
                    @if($errors->get('number-of-users'))
                        @include('errors.list', ['id' => 'number-of-users'])
                    @endif
                @include('forms.end_form_group')

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Generate">
                </div>
            </fieldset>
        </form>
    </div>

    @if (isset($users))
        <div class="row container">
            @foreach($users as $user)
                    {{--Snippet based off of: http://bootsnipp.com/snippets/featured/profile-card--}}
                    <div class="col-md-4 col-sm-6 col-xs-12 card hovercard user">
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
            @endforeach
        </div>
    @endif
@endsection

@section('footer')
    <script type="text/javascript" src="/js/user.js"></script>
@endsection

