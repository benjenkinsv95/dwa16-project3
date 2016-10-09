@extends('layouts.app')

@section('title', 'Password Generator')

@section('content')
    <article class="container">

        <div class="well bs-component">
            <!--    Get a clean URI with htmlspecialchars and avoid hard-coding current file name with $_SERVER["PHP_SELF"] -->
            <form class="form-horizontal" method="POST" action="{{ url('/password_generator') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <div class="form-group">
                        <!-- Inputs get duplicated id's and names, because of the labels and $_POST array.-->
                        <label for="number-of-words" class="col-lg-3 control-label">Number of words (Max 9)</label>
                        <div class="col-lg-9">
                            <input type="number" class="form-control" id="number-of-words" name="number-of-words"
                                   min="1" max="9" value="5" required>
                            <br>
                            <strong>Includes</strong><br>
                            <div class="checkbox">
                                <label for="number-included">
                                    <input type="checkbox" id="number-included" name="number-included">
                                     Number
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="special-symbol-included">
                                    <input type="checkbox" id="special-symbol-included" name="special-symbol-included">
                                    Special Symbol
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <input class="btn btn-primary" type="submit" value="Generate password">
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
        @if(!empty(trim($generatedPassword)))
            <section>
                <h2>Password</h2>
                <pre>{{ $generatedPassword }}</pre>
            </section>
        @endif
    </article>
@endsection

