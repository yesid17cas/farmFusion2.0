<div>
    <div class="buscar">
        <form id="form-busqueda" wire:submit.prevent="render">
            <input type="search" id="buscar" wire:model="search" placeholder="Buscar producto..." required />
            <div class="btnBuscar">
                <button type="submit"><i class="fas fa-search icon"></i></button>
            </div>
        </form>
    </div>

    <!-- Resultados de la búsqueda -->
    <div id="resultado">
        <div class="productBusqueda">
            @if ($search != '')
                @if ($articulos->isEmpty())
                    <ul>
                        <li>
                            <h4> No hay productos</h4>
                        </li>
                    </ul>
                @else
                    @foreach ($articulos as $product)
                        <ul>
                            <li>
                                <img src="{{ asset('images/' . $product->image) }}" alt="">
                                <div>
                                    <h4>{{ $product->name }}</h4>
                                    <p>{{ $product->price }}</p>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
</div>
