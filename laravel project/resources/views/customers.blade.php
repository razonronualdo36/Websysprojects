@extends('layout')

@section('title', 'Customer Accounts')

@section('content')
    <h1>Customer Accounts</h1>
    <p>Manage the customer records stored in the database.</p>

    @if (session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    <a class="button" href="{{ route('customers.create') }}">
        Create Customer
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a
                            class="button small"
                            href="{{ route('customers.edit', $customer) }}"
                        >
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection