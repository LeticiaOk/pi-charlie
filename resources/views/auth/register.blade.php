<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <title>Registro</title>
</head>

<body class="registro">
    <main>
        <p>Charlie Doces</p>
        <h1>Criar cadastro</h1>
        <img src="{{ asset('images/Login-bro.png') }}" alt="" width="370" class="login-img">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="grupo-form">
                <label for="name" value="__('Name')">Nome:</label>
                <input type="text" name="name" id="name" :value="old('name')" required autofocus
                    autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="grupo-form">
                <label for="email" value="__('Email')">Email:</label>
                <input type="email" name="email" id="email" :value="old('email')" required
                    autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="grupo-form">
                <label for="cpf" value="__('CPF')">CPF:</label>
                <input type="text" name="cpf" id="cpf" :value="old('cpf')" required autocomplete="cpf">
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
            </div>

            <div class="grupo-form">
                <label for="password" value="__('Password')">Senha:</label>
                <input type="password" name="password" id="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="grupo-form">
                <label for="password_confirmation":value="__('Confirm Password')">Confirmar senha:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <p class="form-msg">Já tem uma conta? <a class="form-link" href="{{ route('login') }}">Faça Login</a></p>
    </main>

</body>

</html>
