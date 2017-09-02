@extends('layout')

@section('containers')
    <user-profile></user-profile>
@endsection

@section('content')
    <div class="mb-1 mt-1">
        <div>{!! $welcome_message !!}</div>
    </div>
    <div>
        <active-users></active-users>

        <user-update-activity></user-update-activity>

        <messages></messages>

        <messagecomposer></messagecomposer>
    </div>
@endsection
