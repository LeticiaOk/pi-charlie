<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- estilo principal-->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <title>Charlie</title>
</head>

<body class="login">
    <main class="container mt-5 form-login-container" >
        <h1 class="text-center mb-4">Iniciar Sessão</h1>
        <form method="POST" action="{{ route('login') }}" class="form-login">
            @csrf
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email:</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
                <button type="submit" class="btn btn-dark">Login</button>
        </form>
        <p class="text-center mt-3">
            Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a>
        </p>
    </main>
</body>

</html>
