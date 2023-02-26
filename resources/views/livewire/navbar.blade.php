<div>
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
                                <a href="{{ url('/cliente') }}" class="text-primary text-decoration-none">Cadastro</a>
                            @else
                                <a href="{{ url('/home') }}" class=" text-primary text-decoration-none">Home</a>
                            @endif
                        @else
                            <a href="{{ route('quem-somos') }}" class="text-primary text-decoration-none mx-2">Quem somos</a>
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
</div>
