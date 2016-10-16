@extends('layouts.app')

@section('title', 'xkcd-Style Password Generator')
@section('description', 'A password generator based off of the popular web-comic <a href="https://xkcd.com/936/">xkcd.</a>')

@section('content')
    <article class="container">

        <div class="row">
            <form class="form-horizontal col-xs-12 col-sm-10 col-md-7 col-lg-5" method="POST" action='/password_generator'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>

                    <div class="row">
                        <div class="col-xs-12">
                            @include('forms.form_group', ['id' => 'number-of-words'])
                                <label for="number-of-words" class="control-label">Number of words (Max 9)</label>
                                <input type="number" class="form-control" id="number-of-words" name="number-of-words"
                                       min="1" max="9" value="{{ old('number-of-words', 5) }}" required>
                                @if($errors->get('number-of-words'))
                                    @include('errors.list', ['id' => 'number-of-words'])
                                @endif
                            @include('forms.end_form_group')
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>Include</strong>
                        <div class="row">
                            <div class="col-xs-12">
                                @include('forms.checkbox', ['id' => 'number-included', 'label' => 'Number'])
                                @include('forms.checkbox', ['id' => 'special-symbol-included', 'label' => 'Special Symbol'])
                            </div>
                        </div>
                    </div>

                            <div class="form-group">
                                <input class="btn btn-primary btn-block" type="submit" value="Generate password">
                            </div>

                </fieldset>
            </form>

            <!-- Show password if it exists-->
            @if(!empty($generatedPassword))
                <div class="col-xs-12 col-sm-10 col-md-7 col-lg-7">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Password Successfully Generated</h3>
                        </div>
                        <div class="panel-body">
                            {{ $generatedPassword }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </article>
@endsection

