<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Leilões</title>

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}"> --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        
</head>

<body class="inicial">

    <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
        <div class="container-fluid">
            
            <a class="navbar-brand text-primary mx-4" href="{{ url('/') }}">
                <img src="../../img/logo.png" alt="" style="max-width: 150px;">
                {{-- {{ config('app.name', 'Leilões') }} --}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>
                <ul class="nav justify-content-center my-3">
                    
                    <li class="nav-item mx-1">
                        @auth
                            @if(auth()->user()->perfil == 'cli')
                                <a href="{{ url('/home') }}" class="text-primary text-decoration-none">Cliente</a>
                            @else
                                <a href="{{ url('/home') }}" class=" text-primary text-decoration-none">Home</a>
                            @endif
                        @else
                            <a href="" class="text-primary text-decoration-none mx-2">Quem somos</a>
                            <a href="{{ route('cliente') }}" class="text-primary text-decoration-none mx-2">Cadastro</a>
                            <a href="{{ route('login') }}" class="text-primary text-decoration-none mx-2">Login</a>
                        @endauth
                    </li>
                </ul>
                <ul class="navbar-nav me-auto">

                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-12 m-auto">
                <div id="carouselProdutos" class="carousel slide" data-bs-ride="carousel">
                    
                    <div class="carousel-inner">
                        
                        {{-- @foreach($produtos as $produto) --}}
                        <div class="carousel-item active text-center ">
                            <img src="../../img/banner1.png" class="img-fluid" alt="" >
                            {{-- <div class="row align-items-center">
                                <div class="col-sm-2 col-1"></div>
                                <h4 class="col-sm-8 col-10 text-center mt-3" width="80%">Nome banner</h4>
                                <div class="col-sm-2 col-1"></div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm-4 col-4"></div>
                                <a href="" class="col-4 col-sm-4 btn btn-tertiary my-3">Informações</a>
                                <div class="col-sm-4 col-4"></div>
                            </div> --}}
                        </div>
                        {{-- @endforeach --}}
                        <br>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProdutos" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProdutos" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div>
            <div class="fixarRodape  justify-center mt-4 sm:items-center sm:justify-between">
                {{-- <div class="text-center text-sm text-gray-500 sm:text-left"></div> --}}

                <div class="text-center text-sm text-info sm:text-right">
                    <br><br><br>
                    Leilões - Todos os direitos reservados - Desenvolvido por <a href="http://agliardi.tech/" class="underline text-gray-900 dark:text-white" target="_blank">Agliardi Tech</a>
                </div>
            </div>
        </div>
    </div>
    
</body>