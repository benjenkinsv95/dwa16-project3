@extends('layouts.app')

@section('title', 'Random User Generator')
@section('description', 'Creates random user\'s for your application.')

@section('header')
    <link href="/css/random_user.css" rel="stylesheet">

@endsection

@section('content')
    <div class="row container">
        <form class="col-xs-12 col-sm-10 col-md-6" method="POST" action="{{ url('/random_user_generator') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                @include('forms.form_group', ['id' => 'number-of-users'])
                    <!-- Inputs get duplicated id's and names, because of the labels and $_POST array.-->
                    <label for="number-of-users" class="control-label">How many users? (Max {{ $MAX_NUM_USERS }})</label>
                    <input type="number" class="form-control" id="number-of-users" name="number-of-users"
                           min="{{ $MIN_NUM_USERS }}" max="{{ $MAX_NUM_USERS }}" value='{{ old('number-of-users', 6) }}' required>
                    @if($errors->get('number-of-users'))
                        @include('errors.list', ['id' => 'number-of-users'])
                    @endif
                @include('forms.end_form_group')

                <div class="form-group">
                    <strong>Include</strong>
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            @include('forms.checkbox', ['id' => 'pictures-included', 'label' => 'Pictures', 'checked' => 'checked'])
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            @include('forms.checkbox', ['id' => 'username-included', 'label' => 'Username', 'checked' => 'checked'])
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            @include('forms.checkbox', ['id' => 'password-included', 'label' => 'Password', 'checked' => 'checked'])
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            @include('forms.checkbox', ['id' => 'email-included', 'label' => 'Email', 'checked' => 'checked'])
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            @include('forms.checkbox', ['id' => 'birthday-included', 'label' => 'Birthday', 'checked' => 'checked'])
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            @include('forms.checkbox', ['id' => 'address-included', 'label' => 'Address', 'checked' => 'checked'])
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            @include('forms.checkbox', ['id' => 'phone-number-included', 'label' => 'Phone Number', 'checked' => 'checked'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="Generate">
                        </div>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>


    @if (isset($users))
        <div class="row container">
            @foreach($users as $user)
                    {{--Snippet based off of: http://bootsnipp.com/snippets/featured/profile-card--}}
                    <div class="col-sm-6 col-xs-12 card hovercard user">
                        @if(!empty($user->getCoverPictureURL()))
                            <img class="cardheader img-responsive" alt="A background image." src={{$user->getCoverPictureURL()}}>
                        @endif
                        @if(!empty($user->getProfilePictureURL()))
                            <div class="avatar">
                                <img alt="A random user's profile picture." src={{$user->getProfilePictureURL()}}>
                            </div>
                        @endif

                        <div class="info">
                            <div class="title">{{ $user->getFullName() }}</div>
                            <div class="row">
                                <div class="col-sm-6">
                                    @if(!empty($user->getUserName()))
                                        <div class="desc"><i class="fa fa-user" aria-hidden="true"></i> {{ $user->getUserName() }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    @if(!empty($user->getPassword()))
                                        <div class="desc"><i class="fa fa-unlock-alt" aria-hidden="true"></i> {{ $user->getPassword() }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    @if(!empty($user->getEmail()))
                                        <div class="desc"><i class="fa fa-envelope" aria-hidden="true"></i> {{ $user->getEmail() }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    @if(!empty($user->getBirthDate()))
                                        <div class="desc"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $user->getBirthDate() }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    @if(!empty($user->getStreetAddress()))
                                        <div class="desc"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $user->getStreetAddress() }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    @if(!empty($user->getPhoneNumber()))
                                        <div class="desc"><i class="fa fa-mobile" aria-hidden="true"></i> {{ $user->getPhoneNumber() }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    @endif
@endsection

@section('footer')
    <script type="text/javascript" src="/js/user.js"></script>
@endsection

