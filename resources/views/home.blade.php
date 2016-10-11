@extends('layouts.app')

@section('title', 'Developer\'s Best Friend')
@section('header')
    <link href="/css/home.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row first-row">
        <div class="col-sm-6 text-center dev-tool">
            <i class="fa fa-terminal" aria-hidden="true"></i>
            <h3>Midnight Dreary Ipsum</h3>
            <p>
                Finally I pressed a key-- But on the screen what did I see? Again: "Abort, Retry, Ignore." I tried to
                catch the chips off-guard-- I pressed again, but twice as hard. Luck was just not in the cards. I saw
                what I had seen before. Now I typed in desperation.
            </p>
            <a href="{{ URL::route('lorem_ipsum_generator.index') }}" class="btn btn-primary">View</a>
        </div>

        <div class="col-sm-6 text-center dev-tool">
            <i class="fa fa-user" aria-hidden="true"></i>
            <h3>Random User Generator</h3>
            <p>
                But I got a reprimand: it read "Abort, Retry, Ignore." Was this some occult illusion? Some maniacal
                intrusion? These were choices Solomon himself had never faced before. Carefully, I weighed my
                options. These three seemed to be the top ones.
            </p>
            <a href="{{ URL::route('random_user_generator.index') }}" class="btn btn-primary">View</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center dev-tool">
            <i class="fa fa-key" aria-hidden="true"></i>
            <h3>Password Generator</h3>
            <p>
                Luck was just not in the cards. I saw what I had seen before. Now I typed in desperation. Trying random
                combinations. Still there came the incantation: Choose: "Abort, Retry, Ignore." There I sat,
                distraught exhausted, by my own machine accosted.
            </p>
            <a href="{{ URL::route('password_generator.index') }}" class="btn btn-primary">View</a>
        </div>

        <div class="col-sm-6 text-center dev-tool">
            <i class="fa fa-code" aria-hidden="true"></i>
            <h3>Other Project</h3>
            <p>
                Again: "Abort, Retry, Ignore." I tried to catch the chips off-guard-- I pressed again, but twice as
                hard. Luck was just not in the cards. I saw what I had seen before. Now I typed in desperation.
                Trying random combinations.
            </p>
            <a href="/" class="btn btn-primary">View</a>
        </div>
    </div>

@endsection