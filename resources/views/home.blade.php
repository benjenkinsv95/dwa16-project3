@extends('layouts.app')

@section('title', 'Developer\'s Best Friend')
@section('header')
    <link href="/css/random_user.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row first-row">
        <div class="col-sm-6 text-center dev-tool">
            <i class="fa fa-terminal fa-4x" aria-hidden="true"></i>
            <h3>Midnight Dreary Ipsum</h3>
            <p>
                Once upon a midnight dreary, fingers cramped and vision bleary, system manuals piled high and wasted
                paper on the floor. Longing for the warmth of bedsheets, still I sat there, doing spreadsheets;
                having reached the bottom line, I took a floppy from the drawer. Typing with a steady hand,
                then invoked the SAVE command. But I got a reprimand: it read "Abort, Retry, Ignore."
            </p>
            <a href="{{ URL::route('lorem_ipsum_generator.index') }}" class="btn btn-primary">View</a>
        </div>

        <div class="col-sm-6 text-center dev-tool">
            <div class="card hovercard">
                <img class="cardheader img-responsive" alt="" src="http://placeimg.com/600/300/nature">
                <div class="avatar">
                    <img alt="" src="http://placeimg.com/250/250/people">
                </div>
                <div class="info">
                    <h3>Random User Generator</h3>
                    <div class="col-sm-6">
                        <div class="desc"><i class="fa fa-user" aria-hidden="true"></i> torphy.lourdes</div>
                        <div class="desc"><i class="fa fa-unlock-alt" aria-hidden="true"></i> v,eM^[0!;?!Re;]g</div>
                        <div class="desc"><i class="fa fa-envelope" aria-hidden="true"></i> torphy.lourdes@hotmail.com</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="desc"><i class="fa fa-calendar" aria-hidden="true"></i> 03/26/96</div>
                        <div class="desc"><i class="fa fa-map-marker" aria-hidden="true"></i> 9249 Antonette Loop Apt. 478</div>
                        <div class="desc"><i class="fa fa-mobile" aria-hidden="true"></i> 1-641-441-5690 x653</div>
                    </div>

                </div>
            </div>
            <a href="{{ URL::route('random_user_generator.index') }}" class="btn btn-primary">View</a>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6 text-center dev-tool">
            <i class="fa fa-key fa-4x" aria-hidden="true"></i>
            <h3>Password Generator</h3>
            <p>
                Luck was just not in the cards. I saw what I had seen before. Now I typed in desperation. Trying random
                combinations. Still there came the incantation: Choose: "Abort, Retry, Ignore." There I sat,
                distraught exhausted, by my own machine accosted.
            </p>
            <a href="{{ URL::route('password_generator.index') }}" class="btn btn-primary">View</a>
        </div>

        <div class="col-sm-6 text-center dev-tool">
            <i class="fa fa-code fa-4x" aria-hidden="true"></i>
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