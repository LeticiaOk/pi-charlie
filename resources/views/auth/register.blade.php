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

<body class="registro">
    <main class="container mt-5">
        <h1 class="text-center mb-4">Criar Cadastro</h1>

        <form method="POST" action="{{ route('register') }}" class="form-register">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
            </div>

            <div class="form-group mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
            </div>

            <div class="form-group mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf') }}" required autocomplete="cpf">
                <x-input-error :messages="$errors->get('cpf')" class="mt-2 text-danger" />
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
            </div>

            <div class="form-group mb-4">
                <label for="password_confirmation" class="form-label">Confirmar Senha:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
            </div>

                <button type="submit" class="btn btn-dark">Cadastrar</button>
        </form>

        <p class="text-center">
            Já tem uma conta? <a href="{{ route('login') }}">Faça Login</a>
        </p>
    </main>


</body>

</html>
