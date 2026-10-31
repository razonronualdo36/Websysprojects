@extends('layout')

@section('title', 'Home')

@section('content')
    <h1>Welcome to Laravel POS</h1>

    <p>
        This Point of Sale application manages customer and user account
        information using Laravel.
    </p>

    <p>Use the navigation menu above or the buttons below to view the records.</p>

    <a class="button" href="{{ route('customers') }}">View Customers</a>
    <a class="button" href="{{ route('users') }}">View Users</a>
@endsection