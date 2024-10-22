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
                            <li><a href="{{route('misDatos')}}" class="nav-item nav-link {{request()->routeIs('misDatos') ? 'active' : ''}}">Ver Perfil</a></li>
                            <li><a href="{{route('misProductos')}}" class="nav-item nav-link {{request()->routeIs('misProductos') ? 'active' : ''}}">Mis Productos</a></li>
                            <li><a href="{{route('catalogo')}}" class="nav-item nav-link {{request()->routeIs('catalogo') ? 'active' : ''}}">Catálogo</a></li>
                            <li><a href="{{route('tarjeta')}}" class="nav-item nav-link {{request()->routeIs('config') ? 'active' : ''}}">Tarjetas</a></li>
                            <li><a href="{{route('carrito.ver')}}" class="nav-item nav-link {{request()->routeIs('carrito.ver') ? 'active' : ''}}">Carrito</a></li>
                            <li><a href="{{route('compras')}}" class="nav-item nav-link {{request()->routeIs('compras') ? 'active' : ''}}">Lista de compras</a></li>
                            <li><a href="{{route('ventas')}}" class="nav-item nav-link {{request()->routeIs('ventas') ? 'active' : ''}}">Mis Ventas</a></li>
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
                    @livewire('busqueda')
                    <a href="{{route('home')}}" class="nav-item nav-link {{request()->routeIs('home') ? 'active' : ''}}">Inicio</a>
                    <a href="{{route('home') . '#farmFusionAcerca'}}" class="nav-item nav-link">Acerca de Nosotros</a>
                    <a href="{{route('home') . '#farmFusionTeam'}}" class="nav-item nav-link">Team</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-item nav-link" type="submit">Cerrar sesión</button>
                    </form>                   
                </div>
            </div>

            
        </nav>
    </div>
</header>

<script>
    document.getElementById('form-busqueda').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma tradicional
        
        const query = document.getElementById('buscar').value;

        if (!query) {
            alert("Por favor ingresa un término de búsqueda.");
            return;
        }

        // Hacer una solicitud AJAX a la ruta de Laravel para buscar el producto
        fetch(`/buscar?query=${query}`)
            .then(response => response.json())
            .then(data => {
                const resultadoDiv = document.getElementById('resultado');
                resultadoDiv.innerHTML = '';

                if (data.error) {
                    resultadoDiv.innerHTML = `<p>${data.error}</p>`;
                } else {
                    data.forEach(producto => {
                        const div = document.createElement('div');
                        div.className = 'producto';
                        div.innerHTML = `<h3>${producto.nombre}</h3><p>${producto.descripcion}</p><p>Precio: $${producto.precio}</p>`;
                        resultadoDiv.appendChild(div);
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
