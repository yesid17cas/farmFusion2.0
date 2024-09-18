<header class="container-fluid position-fixed nav-bar p-0">
    <div class="container-lg position-fixed p-0 px-lg-3" style="z-index: 9">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <nav>
                <div class="navHerramientas">
                    <div class="container nav-container">
                        <input class="checkbox" type="checkbox" name="" id="" />
                        <div class="hamburger-lines">
                            <span class="line line1"></span>
                            <span class="line line2"></span>
                            <span class="line line3"></span>
                        </div>
                        <div class="menu-items">
                            <li><a href="{{route('misDatos')}}">Ver Perfil</a></li>
                            <li><a href="{{route('catalogo')}}">Categorías</a></li>
                            <li><a href="{{route('verPerfil')}}">Configuraciones</a></li>
                            <!-- <li><a href="#">Portafolio</a></li>
                            <li><a href="#">Blog</a></li> -->
                        </div>
                    </div>
                </div>
            </nav>
            <a href="{{route('home')}}" class="navbar-brand">
                <h1 class="m-0 text-primary">
                    <span class="text-dark">FARM</span>FUSION
                </h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{route('home')}}" class="nav-item nav-link {{request()->routeIs('home') ? 'active' : ''}}">Inicio</a>
                    <a href="{{route('home') . '#farmFusionAcerca'}}" class="nav-item nav-link">Acerca de Nosotros</a>
                    <a href="{{route('home') . '#farmFusionTeam'}}" class="nav-item nav-link">Team</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-item nav-link" type="submit">Cerrar sesión</button>
                    </form>                    
                </div>
            </div>
            <div class="buscar">
                <input type="text" placeholder="Buscar" required />
                <div class="btnBuscar">
                    <i class="fas fa-search icon"></i>
                </div>
            </div>
        </nav>
    </div>
</header>
