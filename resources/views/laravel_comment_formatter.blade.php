@extends('layouts.app')

@section('title', 'Laravel Comment Formatter')
@section('header')
    <link href="/css/comment_formatter.css" rel="stylesheet">
@endsection

@section('content')
<article>

    <div class="row">
        <form class="form-horizontal col-xs-12 col-sm-11 col-md-8 col-lg-7" method="POST" action="{{ url('/laravel_comment_formatter') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <div class="form-group">
                    <label for="title" class="control-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="{{ $PLACEHOLDER_TITLE }}" value='{{ old('title') }}'>
                </div>

                <div class="form-group">
                    <label for="raw-comment" class="control-label">Comment</label>
                    <textarea class="form-control" rows="3" id="raw-comment" name="raw-comment" placeholder="{{ $PLACEHOLDER_RAW_COMMENT }}">{{ old('raw-comment') }}</textarea>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Format">
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

    <!-- Show password if it exists-->
    @if(!empty(trim($formattedComment)))
        <div class="row">
            <div class="col-xs-12 col-sm-11 col-md-8 col-lg-7">
                <h2>Formatted Comment</h2>
                <pre>{{ $formattedComment }}</pre>
            </div>
        </div>
    @endif
</article>
@endsection

