<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- ícones do Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700" />

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- estilo principal-->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Charlie</title>
</head>

<body>
    <header>
        <a href="#">
            {{-- <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo-img"> --}}
        </a>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="{{ route('produtos') }}">Produtos</a></li>
            </ul>
        </nav>

        <div class="icons">

            <div class="dropdown">
                <!-- Botão do dropdown -->
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                </button>
                <!-- Menu Dropdown -->
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- Link para o perfil -->
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a>
                    <!-- Formulário de Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
            <span class="material-symbols-outlined cart">
                shopping_cart
            </span>
        </div>
    </header>
    <section class="banner">
        <form action="" class="pesquisa">
            <input type="text" name="" id="" placeholder="Procure por doces" class="caixa-pesquisa">
            <button type="submit" class="botao-lupa">
                <span class="material-symbols-outlined lupa">
                    search
                </span>
            </button>
        </form>
    </section>
    <main>
        <h1>Bolo</h1>
        <section class="produtos">
            @foreach ($produtosBolo as $produto)
                <div class="produto">
                    <div class="imagem-conteiner">
                        @if ($produto->imagens->isNotEmpty())
                            <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" alt="{{ $produto->PRODUTO_NOME }}" class="produto-imagem">
                        @else
                            <p>Imagem não disponível</p>
                        @endif
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
        <h1>Chocolate</h1>
        <section class="produtos">
            @foreach ($produtosChocolate as $produto)
                <div class="produto">
                    <div class="imagem-conteiner">
                        @if ($produto->imagens->isNotEmpty())
                            <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" alt="{{ $produto->PRODUTO_NOME }}"
                                class="produto-imagem">
                        @else
                            <p>Imagem não disponível</p>
                        @endif
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
