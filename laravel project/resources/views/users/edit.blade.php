@extends('layout')

@section('title', 'Edit User')

@section('content')
    <h1>Edit User</h1>

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

    @if ($user->avatar)
        <div class="avatar-preview">
            <p>Current Avatar</p>
            <img
                src="{{ asset('storage/' . $user->avatar) }}"
                alt="{{ $user->full_name }} avatar"
                class="avatar"
            >
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('users.update', $user) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username', $user->username) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name', $user->full_name) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="avatar">Profile Picture</label>
            <input
                type="file"
                id="avatar"
                name="avatar"
                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
            >
            <small>JPG or PNG only. Maximum file size: 2 MB.</small>
        </div>

        <button class="button" type="submit">Update User</button>
        <a class="button secondary" href="{{ route('users') }}">Cancel</a>
    </form>
@endsection