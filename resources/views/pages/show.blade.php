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

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Charlie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produtos') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carrinho') }}">Carrinho</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Perfil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Editar</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Sair
                                    </button>
                                </form>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('historico.pedidos') }}">Histórico</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <main>
        <div class="card mb-3 card-show">
            <div class="row g-0">
                <div class="col-md-4 show-img-cont">
                    @if ($produto->imagens->isNotEmpty())
                        <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" alt="{{ $produto->PRODUTO_NOME }}"
                            class="img-fluid rounded-start show-img">
                    @else
                        <p>Imagem não disponível</p>
                    @endif
                </div>
                <div class="col-md-8 show-container">
                    <div class="card-body">
                        <h2 class="card-title">{{ $produto->PRODUTO_NOME }}</h2>
                        <h5>{{ $produto->PRODUTO_PRECO }}</h5>
                        <p class="card-text">{{ $produto->PRODUTO_DESC }}.</p>
                        {{-- <p class="card-text"><small class="text-body-secondary">Oferecido por Charlie Doces</small></p> --}}
                        <form action="{{ route('carrinho.adicionar', $produto->PRODUTO_ID) }}" method="POST"
                            class="form-show">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="number" name="quantidade" min="1" value="1"
                                    max="{{ $produto->estoque->PRODUTO_QTD }}" class="form-control"
                                    placeholder="Quantidade">
                                <button type="submit" class="btn btn-dark">Adicionar ao Carrinho</button>
                            </div>
                        </form>
                        <small class="text-muted">Estoque disponível: {{ $produto->estoque->PRODUTO_QTD }}</small>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div>
            <h6>Atendimento ao consumidor</h6>
            <p>Precisa de ajuda? Entre em contato com o nosso SAC! E-mail: sac@finicompany.com</p>
        </div>
        <div>
            <h6>Entrega</h6>
            <p>O prazo de entrega de cada pedido irá depender do endereço de entrega do mesmo. Para consultar o seu prazo, preencha os dados de “Endereço de Entrega” na cesta de compras.</p>
        </div>
        <div>
            <h6>Pagamento</h6>
            <p>Nosso sistema de pagamento online é operado por uma empresa especializada em segurança de pagamento online. Para mais informações, por favor vá para a seção “Pagamento” dentro dos nossos Termos e Condições.​</p>
        </div>
    </footer>

</body>

</html>
