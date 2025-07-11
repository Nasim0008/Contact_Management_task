<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        h1 {
            text-align: center;
            margin-bottom: 24px;
            color: #333;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #2563eb;
            outline: none;
        }

        .error-message {
            color: red;
            font-size: 14px;
            display: block;
            margin-bottom: 10px;
        }

        button {
            width: 100%;
            background-color: #2563eb;
            color: white;
            padding: 12px 0;
            font-size: 16px;
            font-weight: 700;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>

<body>

    <form action="{{ route('admin.doregister') }}" method="POST">
        @csrf

        <h1>Registration</h1>

        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <label for="name">User Name:</label>
        <input type="text" id="name" name="name" placeholder="Username" value="{{ old('name') }}">
        @error('name')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password">
        @error('password')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
        @error('password_confirmation')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <button type="submit">Register</button>
    </form>

</body>

</html>
