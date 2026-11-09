<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | Laravel POS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f6f8;
            color: #1f2937;
            font-family: Arial, sans-serif;
        }

        nav {
            background: #1f6f5f;
            padding: 16px 8%;
        }

        nav strong {
            margin-right: 30px;
            color: white;
            font-size: 20px;
        }

        nav a {
            margin-right: 18px;
            color: white;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            width: 84%;
            max-width: 1000px;
            margin: 35px auto;
            padding: 30px;
            border-radius: 8px;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #1f6f5f;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #d1d5db;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #1f6f5f;
            color: white;
        }

        tr:nth-child(even) {
            background: #f3f4f6;
        }

        .button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            background: #1f6f5f;
            color: white;
            font: inherit;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background: #155347;
            text-decoration: none;
        }

        .button.secondary {
            background: #6b7280;
        }

        .button.secondary:hover {
            background: #4b5563;
        }

        .button.small {
            margin-top: 0;
            padding: 7px 12px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            font: inherit;
        }

        .form-group input:focus {
            border-color: #1f6f5f;
            outline: 2px solid rgba(31, 111, 95, 0.15);
        }

        .form-group small {
            display: block;
            margin-top: 6px;
            color: #6b7280;
        }

        .alert {
            margin: 18px 0;
            padding: 14px 16px;
            border-radius: 5px;
        }

        .alert.success {
            border: 1px solid #86c8b7;
            background: #e8f6f1;
            color: #155347;
        }

        .alert.error {
            border: 1px solid #e4a5a5;
            background: #fff0f0;
            color: #991b1b;
        }

        .alert ul {
            margin-bottom: 0;
        }

        .avatar {
            width: 55px;
            height: 55px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            background: #dbe5e2;
            object-fit: cover;
        }

        .avatar-preview {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav>
        <strong>Laravel POS</strong>

        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}">Customers</a>
        <a href="{{ route('users') }}">Users</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>