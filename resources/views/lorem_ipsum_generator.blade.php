@extends('layouts.app')

@section('title', 'Midnight Dreary Ipsum')
@section('header')
    <link href="/css/lorem_ipsum.css" rel="stylesheet">
@endsection


@section('content')
    <div class="row container">
        A Lorem Ipsum Generator based on the <a href="https://www.gnu.org/fun/jokes/midnight.dreary.html">"Midnight Dreary" poem.</a>

        <form class="form-horizontal" method="POST" action="{{ url('/lorem_ipsum_generator') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <div class="form-group">
                    <!-- Inputs get duplicated id's and names, because of the labels and $_POST array.-->
                    <label for="number-of-paragraphs" class="col-lg-3 control-label">How many paragraphs? (Max {{ $MAX_NUM_PARAGRAPHS }})</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" id="number-of-paragraphs" name="number-of-paragraphs"
                               min="{{ $MIN_NUM_PARAGRAPHS }}" max="{{ $MAX_NUM_PARAGRAPHS }}" value="{{ $numberOfParagraphs }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <!-- Inputs get duplicated id's and names, because of the labels and $_POST array.-->
                    <label for="number-of-sentences" class="col-lg-3 control-label">How many sentences? (Max {{ $MAX_NUM_SENTENCES }})</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" id="number-of-sentences" name="number-of-sentences"
                               min="{{ $MIN_NUM_SENTENCES }}" max="{{ $MAX_NUM_SENTENCES }}" value="{{ $numberOfSentences }}" required>
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

    @if (isset($paragraphs))
        <div class="row container generated-ipsum">
            @foreach($paragraphs as $paragraph)
                @if ($loop->first)
                    <p class="lead">{{ $paragraph }}</p>
                @else
                    <p>{{ $paragraph }}</p>
                @endif
            @endforeach
        </div>
    @endif
@endsection

