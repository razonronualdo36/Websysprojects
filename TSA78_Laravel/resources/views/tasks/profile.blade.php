@extends('tasks.layout')
@section('content')
<h1>Profile</h1><p>Project by Ronualdo Isaac Razon · IT0049 Web System Technologies</p>
@auth<p>You are signed in as <strong>{{ auth()->user()->name }}</strong>.</p>@else<p>You are browsing as a guest. Sign in to manage tasks.</p>@endauth
@endsection
