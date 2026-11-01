<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="login-page">
    <div class="login-card">
        <h1>Login Sistem Perpustakaan</h1>

        @if (session()->has('success'))
            <div>
                @foreach ([session('success')] as $success)
                    <p>{{ $success }}</p>
                @endforeach
            </div>
        @endif

        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('login.submit') }}" method="POST">
                @csrf

                <div>
                    <label for="email">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div>
                    <label for="password">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                    >
                </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>