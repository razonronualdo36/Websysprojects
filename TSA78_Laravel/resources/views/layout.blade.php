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
            border-radius: 5px;
            background: #1f6f5f;
            color: white;
            text-decoration: none;
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