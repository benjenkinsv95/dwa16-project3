@extends('layouts.app')

@section('title', 'Laravel Comment Formatter')

@section('content')
<article>

    <div class="row">
        <form class="form-horizontal container" method="POST" action="{{ url('/laravel_comment_formatter') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="{{ $PLACEHOLDER_TITLE }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="raw-comment" class="col-lg-2 control-label">Comment</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="raw-comment" name="raw-comment" placeholder="{{ $PLACEHOLDER_RAW_COMMENT }}"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <input class="btn btn-primary" type="submit" value="Format">
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

    <!-- Show password if it exists-->
    @if(!empty(trim($formattedComment)))
        <div class="row">
            <h2>Formatted Comment</h2>
            <pre>{{ $formattedComment }}</pre>
        </div>
    @endif
</article>
@endsection

