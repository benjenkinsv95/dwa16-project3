@extends('layouts.app')

@section('title', 'Laravel Comment Formatter')
@section('description', 'Format your comments in beautiful Laravel fashion.')

@section('header')
    <link href="/css/comment_formatter.css" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <form class="col-xs-12 col-sm-11 col-md-8 col-lg-5" method="POST" action="{{ url('/laravel_comment_formatter') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset>
            @include('forms.form_group', ['id' => 'title'])
                <label for="title" class="control-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="{{ $PLACEHOLDER_TITLE }}" value='{{ old('title') }}' required>
                @if($errors->get('title'))
                     @include('errors.list', ['id' => 'title'])
                @endif
            @include('forms.end_form_group')

            @include('forms.form_group', ['id' => 'comment'])
                <label for="comment" class="control-label">Comment</label>
                <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="{{ $PLACEHOLDER_COMMENT }}" required>{{ old('comment') }}</textarea>
                @if($errors->get('comment'))
                    @include('errors.list', ['id' => 'comment'])
                @endif
            @include('forms.end_form_group')

            <div class="row">
                <div class="col-xs-12 col-sm-5">
                    <div class="form-group">
                        <input class="btn btn-primary btn-block" type="submit" value="Format">
                    </div>
                </div>
            </div>
        </fieldset>
    </form>

    <!-- Show password if it exists-->
    @if(!empty(trim($formattedComment)))
        <div class="col-xs-12 col-sm-11 col-md-8 col-lg-7">
            <pre>{{ $formattedComment }}</pre>
        </div>
    @endif
</div>
@endsection

