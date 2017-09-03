@if(session()->has('errors'))
    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach(session('errors') as $err)
            <li>{{ $err }}</li>
        @endforeach
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif
