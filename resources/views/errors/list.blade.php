<div class="alert alert-danger">
    <ul>
        @foreach ($errors->get($id) as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
