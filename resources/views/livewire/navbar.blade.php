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
                <ul class="navbar-nav justify-content-center my-3">
                    
            
                    
                    
                    <li class="nav-item mx-1">
                        @auth
                            {{-- @if(auth()->user()->perfil == 'cli')
                                <a class="nav-link dropdown-toggle link-primary text-blue" href="{{ url('/cliente') }}">Cadastro</a>
                            @else
                                <a class="nav-link dropdown-toggle link-primary text-blue" href="{{ url('/home') }}">Home</a>
                            @endif --}}
                        @else
                            <a href="{{ route('quem-somos') }}" class="text-primary text-decoration-none mx-2">Quem somos</a>
                            <a href="{{ route('cliente.create') }}" class="text-primary text-decoration-none mx-2">Cadastro</a>
                            <a href="{{ route('login') }}" class="text-primary text-decoration-none mx-2">Login</a>
                        @endauth
                    </li>
                </ul>
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav justify-content-center ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @else
                        @if(auth()->user()->perfil == 'cli')
                            
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle link-primary text-blue" href=""  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Meu cadastro</a>
                                
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="">Atualizar dados</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle link-primary text-blue" href=""  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Meus lances</a>
                                
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="">Lances efetuados</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="">Lances contemplados</a></li>
                                </ul>
                            </li>
                        @endif
                        @if(auth()->user()->perfil == 'adm')
                            
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle link-primary text-blue" href=""  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Site</a>
                                
                                <ul class="dropdown-menu dropdown-menu-custom">
                                    <li><a class="dropdown-item text-blue" href="{{ route('site') }}">Acessar site</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-blue" href="">Quem somos</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-blue" href="">Banner</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-blue" href="">Rodapé</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle link-primary text-blue" href=""  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Cliente</a>
                                
                                <ul class="dropdown-menu dropdown-menu-custom">
                                    <li><a class="dropdown-item text-blue" href="">Lista de clientes</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle link-primary text-blue" href=""  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Leilões</a>
                                
                                <ul class="dropdown-menu dropdown-menu-custom">
                                    <li><a class="dropdown-item text-blue" href="">Lista de Leilões</a></li>
                                    {{-- <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="">Lances contemplados</a></li> --}}
                                </ul>
                            </li>
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle link-primary text-blue" href=""  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Lotes</a>
                                
                                <ul class="dropdown-menu dropdown-menu-custom">
                                    <li><a class="dropdown-item text-blue" href="">Lista de lotes</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-blue" href="">Gerar visualizações</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-blue" href="">Cancelar evento automático</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-blue" href="">Cancelar visualizações</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle link-primary text-blue" href=""  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Lances</a>
                                
                                <ul class="dropdown-menu dropdown-menu-custom">
                                    <li><a class="dropdown-item text-blue" href="">Lista de lances</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-blue" href="">Exclusão em massa</a></li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item dropdown mx-2">
                            <a id="navbarDropdown text-blue" class="nav-link dropdown-toggle text-blue" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu  dropdown-menu-custom dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-blue" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
{{-- <script type="module">
    import hotwiredturbo from 'https://cdn.skypack.dev/@hotwired/turbo'
</script> --}}
