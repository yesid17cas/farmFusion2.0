<div class="containerForm">
    <div class="row input-container">
        <div class="col-xs-12">
            <div class="styled-input wide">
                <input type="text" required />
                <label>Nombre del producto</label> 
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="styled-input">
                <input type="text" id="precio" required oninput="formatCurrency(this)" />
                <label>Precio (COP)</label> 
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="styled-input" style="float:right;">
                <input type="number" id="existencia" required min="0" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                <label>Existencia</label> 
            </div>
        </div>
        <div class="col-xs-12">
            <div class="styled-input wide">
                <textarea required></textarea>
                <label>Descripción</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="btn-lrg submit-btn">Cargar producto</div>
        </div>
    </div>
</div>

<script>
    function formatCurrency(input) {
        // Remover cualquier cosa que no sea un número
        let value = input.value.replace(/[^0-9]/g, '');
        if (value.length > 0) {
            // Formatear con el símbolo $ delante
            input.value = '$' + value;
        } else {
            input.value = ''; // Si se borra todo, también se quita el $ , pilas castaño lo borra 
        }
    }
</script>
