@extends('partials.layout')

@section('content')
<div class="containerCatalogo">

    <h3 class="title">Mis Productos</h3>

    <div class="products-container">
        <!-- Mostrar todos los productos -->
        @foreach($productos as $producto)
            <div class="product" data-name="p-{{ $producto->id }}">
                <img src="{{ Vite::asset('resources/img/' . $producto->image) }}" alt="">
                <h3>{{ $producto->name }}</h3>
                <div class="price">${{ number_format($producto->price, 0, ',', '.') }}</div>

                <!-- Botones de editar y eliminar -->
                <div class="product-actions">
                    <button class="edit-btn" 
                        data-id="{{ $producto->id }}" 
                        data-name="{{ $producto->name }}" 
                        data-descrition="{{ $producto->descrition }}" 
                        data-price="{{ $producto->price }}" 
                        data-exits="{{ $producto->exits }}">
                        Editar
                    </button>
                    
                    {{-- <form action="{{ route('products.destroy', $producto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Eliminar</button>
                    </form> --}}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Botón de agregar producto -->
    <div class="button-container">
        <a href="{{ route('products.create') }}" class="add-product-btn">Agregar Producto</a>
    </div>

</div>

<!-- Modal de edición -->
<div id="editModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Producto</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" id="productId" name="productId">

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="descrition">Descripción:</label>
                <input type="text" id="descrition" name="descrition" required>
            </div>

            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="text" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="exits">Existencias:</label>
                <input type="number" id="exits" name="exits" required>
            </div>

            <button type="submit" class="save-btn">Guardar Cambios</button>
        </form>
    </div>
</div>



@endsection

@section('style')
@vite('resources/css/catalogo.css')
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    // Código para el modal
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const modal = document.getElementById('editModal');
            modal.style.display = "block"; // Mostrar el modal

            // Obtener los datos del producto desde los atributos del botón
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const descrition = this.getAttribute('data-descrition');
            const price = this.getAttribute('data-price');
            const exits = this.getAttribute('data-exits');

            // Llenar el formulario del modal con los datos del producto
            document.getElementById('productId').value = id;
            document.getElementById('name').value = name;
            document.getElementById('descrition').value = descrition;
            document.getElementById('price').value = price;
            document.getElementById('exits').value = exits;

            // Actualizar la acción del formulario con la URL correcta
            document.getElementById('editForm').action = `/products/${id}`;
        });
    });

    // Cerrar el modal
    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('editModal').style.display = "none";
    });
    // Cerrar el modal cuando se haga clic fuera de él
    window.onclick = function(event) {
        const modal = document.getElementById('editModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});


</script>
@endsection
