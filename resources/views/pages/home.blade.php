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
                            <li><hr class="dropdown-divider"></li>
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
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/4815327/pexels-photo-4815327.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    class="d-block w-100 carousel-img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/6697277/pexels-photo-6697277.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    class="d-block w-100 carousel-img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/7219928/pexels-photo-7219928.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    class="d-block w-100 carousel-img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <main>
        <h1>Bolos Variados</h1>
        <div class="container my-5">
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($produtosBolo->chunk(3) as $chunk) <!-- Agrupando produtos de 3 em 3 -->
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $produto)
                                    <div class="col-md-4">
                                        <div class="card card-home">
                                            @if ($produto->imagens->isEmpty() || !$produto->imagens->first()->IMAGEM_URL)
                                            <div class="card-img-top card-img-top-produtos" style="height: 200px; display: flex; justify-content: center; align-items: center; background-color: #f5f5f5;">
                                                <span>Imagem não disponível</span>
                                            </div>
                                        @else
                                            <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" class="card-img-top card-img-top-produtos" alt="{{ $produto->PRODUTO_NOME }}">
                                        @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                                                <p class="card-text">R$ {{ number_format($produto->PRODUTO_PRECO, 2, ',', '.') }}</p>
                                                <a href="{{ route('show', $produto->PRODUTO_ID) }}" class="btn btn-dark">Comprar</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>

        {{-- <button type="button" class="btn btn-outline-dark btn-buy">Comprar todos</button> --}}

        <h1>Tortas</h1>
        <div class="container my-5">
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($produtosTorta->chunk(3) as $chunk) <!-- Agrupando produtos de 3 em 3 -->
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $produto)
                                    <div class="col-md-4">
                                        <div class="card card-home">
                                            @if ($produto->imagens->isEmpty() || !$produto->imagens->first()->IMAGEM_URL)
                                            <div class="card-img-top card-img-top-produtos" style="height: 200px; display: flex; justify-content: center; align-items: center; background-color: #f5f5f5;">
                                                <span>Imagem não disponível</span>
                                            </div>
                                        @else
                                            <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" class="card-img-top card-img-top-produtos" alt="{{ $produto->PRODUTO_NOME }}">
                                        @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                                                <p class="card-text">R$ {{ number_format($produto->PRODUTO_PRECO, 2, ',', '.') }}</p>
                                                <a href="{{ route('show', $produto->PRODUTO_ID) }}" class="btn btn-dark">Comprar</a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>

        <div class="cont-btn">

            <a href="{{ route('produtos') }}" class="btn btn-outline-dark btn-buy">Comprar todos</a>
        </div>
        {{-- <button type="button" class="btn btn-outline-dark btn-buy">Comprar todos</button> --}}
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
