@extends('layouts.app')

@section('title', 'Developer\'s Best Friend')
@section('header')
    <link href="/css/random_user.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row first-row">
        <div class="col-md-6 text-center dev-tool">
            <div class="tool-content">
                <i class="fa fa-terminal fa-4x" aria-hidden="true"></i>
                <h3>Abort, Retry, Ignorum</h3>
                <p>
                    A Lorem Ipsum Generator based upon a midnight dreary, fingers cramped and vision bleary, system manuals
                    piled high and wasted paper on the floor. Longing for the warmth of bedsheets, still I sat there,
                    doing spreadsheets; having reached the bottom line, I took a floppy from the drawer. Typing
                    with a steady hand, then invoked the SAVE command. But I got a reprimand: it read
                    "Abort, Retry, Ignore."
                </p>
            </div>
            <a href="{{ URL::route('lorem_ipsum_generator.index') }}" class="btn btn-primary">View</a>
        </div>

        <div class="col-md-6 text-center dev-tool">
            <div class="card hovercard tool-content">
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
        <div class="col-md-6 text-center dev-tool">
            <div class="tool-content">
                <i class="fa fa-key fa-4x" aria-hidden="true"></i>
                <h3>xkcd-Style Password Generator</h3>
                <p>
                    Create a secure password! Password's are based off of the popular web-comic <a href="https://xkcd.com/936/">xkcd.</a>
                </p>
                <pre>crash-tight-en~tertaining-damaging-moti8on</pre>
            </div>

            <a href="{{ URL::route('password_generator.index') }}" class="btn btn-primary">View</a>
        </div>

        <div class="col-md-6 text-center dev-tool">
            <div class="tool-content">
                <pre class="text-left comment-formatter">/*
|--------------------------------------------------------------------
| Laravel Comment Formatter
|--------------------------------------------------------------------
|
| This tool will format your text in the style of a Laravel
| comment. Try it out for yourself! Once upon a midnight
| dreary, fingers cramped and vision bleary...
|
*/</pre>
            </div>

            <a href="{{ URL::route('laravel_comment_formatter.index') }}" class="btn btn-primary">View</a>
        </div>
    </div>

@endsection