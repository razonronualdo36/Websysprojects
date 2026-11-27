@extends('layout')

@section('title', 'Edit Customer')

@section('content')
    <h1>Edit Customer</h1>

    @if ($errors->any())
        <div class="alert error">
            <strong>Please correct the following:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('customers.update', $customer) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name', $customer->full_name) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $customer->email) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $customer->phone) }}"
            >
        </div>

        <button class="button" type="submit">Update Customer</button>
        <a class="button secondary" href="{{ route('customers') }}">Cancel</a>
    </form>
@endsection