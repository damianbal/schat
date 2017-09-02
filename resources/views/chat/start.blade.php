@extends('layout')

@section('content')
        <div class="mb-1 mt-1">{!! $welcome_message !!}</div>

    <div>
            <form method="POST" action="{{ route('chat.enter') }}">

                {{ csrf_field() }}
      <div class="form-group">
        <label class="muted">Username</label>
        <input name="username" type="text" class="form-control dark-form-control" placeholder="Enter username">
      </div>
      <div class="form-group">
          <label class="muted">Password</label>
          <input name="password" type="password" class="form-control dark-form-control" placeholder="Enter password">
          <small>If you created account, please provide your password.</small>
      </div>
    <div class="form-group">
          <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#colorCollapse"> Set custom color</button>
          <br>
          <small>Only if you are creating new account</small>
      </div>
      <div class="form-group collapse" id="colorCollapse">
          <br>
        <label class="muted">HEX/RGB color</label>
        <input name="color" type="text" class="form-control dark-form-control" placeholder="HEX/RGB" value="#2196F3">
      </div>

      <div class="text-center"><button type="submit" class="btn btn-dark">Enter chat</button></div>
    </form>
    </div>
@endsection
