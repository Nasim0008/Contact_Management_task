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
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            display: block;
            margin-bottom: 10px;
        }

        .success-message {
            color: green;
            font-size: 18px;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid #c3e6cb;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
        }

        .session-error {
            text-align: center;
            color: red;
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
    </style>
</head>

<body>

    <form action="{{ route('admin.doLogin') }}" method="POST">
        @csrf
        <h2>Admin Login</h2>

        @if (session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <p class="session-error">{{ session('error') }}</p>
        @endif

        <label for="email">Username:</label>
        <input type="email" id="email" placeholder="Enter Email" name="email">
        <span class="error-message">
            @error('email')
                {{ $message }}
            @enderror
        </span>

        <label for="password">Password:</label>
        <input type="password" id="password" placeholder="Enter Password" name="password">
        <span class="error-message">
            @error('password')
                {{ $message }}
            @enderror
        </span>

        <button type="submit">Login</button>
    </form>

</body>

</html>
