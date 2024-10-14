<div>
    <form action="" method="POST">
        <!-- Campo oculto (ID del producto) -->
        <input type="hidden" name="producto_id" value="12345">

        <div class="containerForm">
            <div class="row input-container">
                <div class="col-xs-12">
                    <!-- Campo deshabilitado (Nombre del producto) -->
                    <div class="styled-input wide">
                        <label for="producto_nombre">Nombre del Producto:</label>
                        <input type="text" id="producto_nombre" name="producto_nombre" value="" disabled>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <!-- Campo numérico (Cantidad de entradas) -->
                    <div class="styled-input">
                        <label for="cantidad">Cantidad de entradas:</label>
                        <input type="number" id="cantidad" name="cantidad" min="1" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <!-- Botón de envío -->
                    <button type="submit" class="btn-lrg submit-btn">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>
