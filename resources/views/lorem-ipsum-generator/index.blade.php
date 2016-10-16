@extends('layouts.app')

@section('title', 'Abort, Retry, Ignorum')
@section('description', 'A Lorem Ipsum Generator based on the <a href="https://www.gnu.org/fun/jokes/midnight.dreary.html">"Midnight Dreary" poem.</a>')

@section('header')
    <link href="/css/lorem_ipsum.css" rel="stylesheet">
@endsection


@section('content')
    <div class="row">
        <form class="col-xs-12 col-md-8" method="POST" action="{{ url('/lorem_ipsum_generator') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <div class="row">
                    <div class="col-xs-12 col-sm-5">
                         @include('forms.form_group', ['id' => 'number-of-paragraphs'])
                            <!-- Inputs get duplicated id's and names, because of the labels and $_POST array.-->
                            <label for="number-of-paragraphs" class="control-label">How many paragraphs? (Max {{ $MAX_NUM_PARAGRAPHS }})</label>
                            <input type="number" class="form-control" id="number-of-paragraphs" name="number-of-paragraphs"
                                   min="{{ $MIN_NUM_PARAGRAPHS }}" max="{{ $MAX_NUM_PARAGRAPHS }}" value="{{ old('number-of-paragraphs', 3) }}" required>
                            @if($errors->get('number-of-paragraphs'))
                                @include('errors.list', ['id' => 'number-of-paragraphs'])
                            @endif
                        @include('forms.end_form_group')
                    </div>

                    <div class="col-xs-12 col-sm-5  col-sm-offset-1">
                         @include('forms.form_group', ['id' => 'number-of-sentences'])
                            <!-- Inputs get duplicated id's and names, because of the labels and $_POST array.-->
                            <label for="number-of-sentences" class="control-label">How many sentences? (Max {{ $MAX_NUM_SENTENCES }})</label>
                            <input type="number" class="form-control" id="number-of-sentences" name="number-of-sentences"
                                   min="{{ $MIN_NUM_SENTENCES }}" max="{{ $MAX_NUM_SENTENCES }}" value="{{ old('number-of-sentences', 5) }}" required>
                            @if($errors->get('number-of-sentences'))
                                @include('errors.list', ['id' => 'number-of-sentences'])
                            @endif
                         @include('forms.end_form_group')
                     </div>

                    <div class="col-xs-12 col-sm-5">
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="Generate">
                        </div>
                    </div>
                </div>
            </fieldset>
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



