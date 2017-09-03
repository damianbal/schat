@extends('layout')

@section('content')
        <div class="mb-1 mt-1 p-1">{!! $welcome_message !!}</div>


            <form style="height:500px;" method="POST" action="{{ route('chat.enter') }}">

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
          <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#colorCollapse"  aria-expanded="false" aria-controls="collapseExample"> Set custom color</button>
          <br>
          <small>Only if you are creating new account</small>
      </div>
      <div class="form-group">
          <br>
          <div class="collapse" id="colorCollapse">
            <label class="muted">HEX/RGB color</label>
            <input name="color" type="text" class="form-control dark-form-control" placeholder="HEX/RGB" value="#2196F3">
          </div>
      </div>

      <div class="form-group">

      <div class="text-center"><button type="submit" class="btn btn-dark">Enter chat</button></div>
  </div>
    </form>
    </div>
@endsection
