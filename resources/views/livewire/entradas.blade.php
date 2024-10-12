<div>
    <form action="" method="POST">
        <!-- Campo oculto (ID del producto) -->
        <input type="hidden" name="producto_id" value="12345">
        
        <!-- Campo deshabilitado (Nombre del producto) -->
        <label for="producto_nombre">Nombre del Producto:</label>
        <input type="text" id="producto_nombre" name="producto_nombre" value="" disabled>
        <br><br>
        
        <!-- Campo numérico (Cantidad a dar de baja) -->
        <label for="cantidad">Cantidad de entradas:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" required>
        <br><br>
        
        
        <input type="submit" value="Enviar">
    </form>
</div>
