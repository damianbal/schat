@if(session()->has('_errors'))
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach(session('_errors') as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('errors'))
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
