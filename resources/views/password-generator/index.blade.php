@extends('layouts.app')

@section('title', 'xkcd-Style Password Generator')

@section('content')
    <article class="container">

        <div class="row">
            <form class="form-horizontal col-xs-12 col-sm-10 col-md-7 col-lg-6" method="POST" action='/password_generator'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>

                    @include('forms.form_group', ['id' => 'number-of-words'])
                        <label for="number-of-words" class="control-label">Number of words (Max 9)</label>
                        <input type="number" class="form-control" id="number-of-words" name="number-of-words"
                               min="1" max="9" value="{{ old('number-of-words') }}" required>
                        @if($errors->get('number-of-words'))
                            @include('errors.list', ['id' => 'number-of-words'])
                        @endif
                    @include('forms.end_form_group')

                    <div class="form-group">
                        <strong>Include</strong>
                        <div class="checkbox">
                            <label for="number-included">
                                <input type="checkbox" id="number-included" name="number-included" value="{{ old('number-included') }}">
                                 Number
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="special-symbol-included">
                                <input type="checkbox" id="special-symbol-included" name="special-symbol-included" value="{{ old('special-symbol-included') }}">
                                Special Symbol
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Generate password">
                    </div>

                </fieldset>
            </form>
        </div>


        <!-- Show password if it exists-->
        @if(!empty($generatedPassword))
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
                    <h2>Password</h2>
                    <pre>{{ $generatedPassword }}</pre>
                </div>
            </div>
        @endif
    </article>
@endsection

