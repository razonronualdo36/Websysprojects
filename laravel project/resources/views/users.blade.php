@extends('layout')

@section('title', 'User Accounts')

@section('content')
    <h1>User Accounts</h1>
    <p>Manage the system users stored in the database.</p>

    @if (session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    <a class="button" href="{{ route('users.create') }}">
        Create User
    </a>

    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <img
                            src="{{ $user->avatar
                                ? asset('storage/' . $user->avatar)
                                : asset('images/placeholder-avatar.svg') }}"
                            alt="{{ $user->full_name }} avatar"
                            class="avatar"
                        >
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>
                        <a
                            class="button small"
                            href="{{ route('users.edit', $user) }}"
                        >
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection