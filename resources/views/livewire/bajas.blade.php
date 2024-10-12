<div>
    <form action="/procesar_baja" method="POST">
        <!-- Campo oculto (ID del producto) -->
        <input type="hidden" name="producto_id" value="12345">
        
        <!-- Campo deshabilitado (Nombre del producto) -->
        <label for="producto_nombre">Nombre del Producto:</label><br>
        <input type="text" id="producto_nombre" name="producto_nombre" value="" disabled>
        <br><br>
        
        <!-- Campo numérico (Cantidad a dar de baja) -->
        <label for="cantidad">Cantidad a dar de baja:</label><br>
        <input type="number" id="cantidad" name="cantidad" min="1" required>
        <br><br>
        
        <!-- Textarea (Motivo de la baja) -->
        <label for="motivo">Motivo de la baja:</label><br>
        <textarea id="motivo" name="motivo" rows="4" cols="50" placeholder="Escribe el motivo de la baja..." required></textarea>
        <br><br>
        
        <input type="submit" value="Enviar">
    </form>
</div>
