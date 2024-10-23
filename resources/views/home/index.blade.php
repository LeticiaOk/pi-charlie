<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- ícones do Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700" />

    <!-- estilo principal-->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Charlie</title>
</head>

<body>
    <header>
        <a href="#">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo-img">
        </a>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Produtos</a></li>
            </ul>
        </nav>
        <div class="icons">
            <a href="#">
                <span class="material-symbols-outlined">
                    person
                </span>
            </a>
            <a href="#">
                <span class="material-symbols-outlined">
                    shopping_cart
                </span>
            </a>
        </div>
    </header>
    <section class="banner">
        <form action="" class="pesquisa">
            <input type="text" name="" id="" placeholder="Procure por doces" class="caixa-pesquisa">
            <button type="submit">
                <span class="material-symbols-outlined lupa">
                    search
                </span>
            </button>
        </form>
    </section>
    <main>
        <h1>Chocolate</h1>
        <section class="produtos">
            @foreach ($produtosChocolate as $produto)
                <div class="produto">
                    <div class="imagem-conteiner">
                        <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" alt="{{ $produto->PRODUTO_NOME }}"
                            class="produto-imagem">
                    </div>
                    <p class="produto-nome">{{ $produto->PRODUTO_NOME }}</p>
                    <p class="produto-preco">R$ {{ $produto->PRODUTO_PRECO }}</p>
                    <div class="produto-compra">
                        <a href="" class="comprar">Comprar</a>
                    </div>
                </div>
            @endforeach
        </section>
        <a href="#" class="link-produtos">Comprar todos</a>
        <h1>Bolo</h1>
        <section class="produtos">
            @foreach ($produtosBolo as $produto)
            <div class="produto">
                <div class="imagem-conteiner">
                    <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" alt="{{ $produto->PRODUTO_NOME }}"
                        class="produto-imagem">
                </div>
                <p class="produto-nome">{{ $produto->PRODUTO_NOME }}</p>
                <p class="produto-preco">R$ {{ $produto->PRODUTO_PRECO }}</p>
                <div class="produto-compra">
                    <a href="" class="comprar">Comprar</a>
                </div>
            </div>
        @endforeach
        </section>
    </main>
</body>

</html>