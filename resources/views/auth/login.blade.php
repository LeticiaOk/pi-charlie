<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <title>Login</title>
</head>

<body class="login">
    <main>
        <p>Charlie Doces</p>
        <h1>Iniciar sessão</h1>
        <img src="{{ asset('images/Login-bro.png') }}" alt="" width="370" class="login-img">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="grupo-form">
                <label for="email" :value="__('Email')">Email:</label>
                <input id="email" class="input input-email" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" :value="__('Password')">Senha:</label>
                <input id="password" class="input input-password" type="password" name="password" required
                    autocomplete="current-password">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit">Login</button>
        </form>
    </main>
</body>

</html>
