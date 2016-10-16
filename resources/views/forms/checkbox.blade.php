{{--<div class="checkbox">--}}
    {{--<label for="{{ $id }}">--}}
        {{--<input type="checkbox" id="{{ $id }}" name="{{ $id }}"{{isset($checked) ? " checked": ""}}>--}}
        {{--{{$label}}--}}
    {{--</label>--}}
{{--</div>--}}

<label for="{{ $id }}" class="checkbox-inline"><input type="checkbox" id="{{ $id }}" name="{{ $id }}"{{isset($checked) ? " checked": ""}}>{{$label}}</label>