<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        span {
            color: red;
            font-size: 14px;
            display: block;
            margin-bottom: 10px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #1d4ed8;
        }

        p {
            text-align: center;
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>



    <form action="{{ route('admin.doLogin') }}" method="POST">
        @csrf
        <h2>Admin Login</h2>
        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <label for="username">Username:</label>
        <input type="text" id="username" placeholder="Enter Username" name="username" required>
        <span>
            @error('username')
                {{ $message }}
            @enderror
        </span>

        <label for="password">Password:</label>
        <input type="password" id="password" placeholder="Enter Password" name="password" required>
        <span>
            @error('password')
                {{ $message }}
            @enderror
        </span>

        <button type="submit">Login</button>
    </form>

</body>

</html>
