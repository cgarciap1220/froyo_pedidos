<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            var url = <?php echo json_encode(base_url(), JSON_HEX_TAG); ?>;
        </script>
    </head>
    <body>
        <form id="form" name="form" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>productos_controller/agregar_producto">
            <label>Nombre del Producto: </label>
            <input name="nombre_producto" type="text" id="nombre_producto" />
            <label>Nivel de Ventas: </label>
            <select name="nivel_ventas" id="nivel_ventas">
                <option selected="selected">Seleccionar</option>
                <option>Altas</option>
                <option>Bajas</option>
            </select>
            <label>Selecciona Foto: </label>
            <input name="userfile" type="file" />
            <label>Stoke: </label>
            <select name="stoke" id="stoke">
                <option selected="selected">Seleccionar</option>
                <option>Si</option>
                <option>No</option>
            </select>
            <label>Estado: </label>
            <select name="estado" id="estado">
                <option selected="selected">Seleccionar</option>
                <option>Ofertado</option>
                <option>Novedoso</option>
                <option>Normal</option>
            </select>
            <label>Categoria: </label>
            <select name="categoria" id="categoria" onchange="return Obtener_subcategoria();">
                <option selected="selected">Seleccionar</option>
                <?php foreach ($categoria as $cat): ?>
                    <option value="<?php echo $cat->id_categoria ?>">
                        <?php echo $cat->categoria ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label>Subcategoria: </label>
            <div id="subcategoria">
                <select name="subcategoria" id="subcategoria" class="form-control" >
                    <option selected="selected">Seleccionar</option>
                    <?php foreach ($subcategoria as $sub): ?>
                        <option value="<?php echo $sub->id_subcategoria ?>">
                            <?php echo $sub->subcategoria ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label>Peso: </label>
            <input name="peso" type="text" id="peso" />
            <label>Descripcion: </label>
            <textarea name="descripcion" id="descripcion"></textarea>
            <input type="submit" name="agregar" id="agregar" value="Agregar Producto">

        </form>
    </body>

    <script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/miscripts.js"></script>
</html>
