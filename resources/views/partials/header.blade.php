<header class="container-fluid position-fixed nav-bar p-0">
    <div class="container-lg position-fixed p-0 px-lg-3" style="z-index: 9">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="" class="navbar-brand">
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
                    <a href="" class="nav-item nav-link">Acerca de Nosotros</a>
                    <a href="" class="nav-item nav-link">Team</a>
                    <a href="{{route('home')}}" class="nav-item nav-link">Iniciar Sesión</a>
                </div>
            </div>
        </nav>
    </div>
</header>