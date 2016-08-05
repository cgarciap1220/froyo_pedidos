<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <script>
        window.onload = function () {
            loadCaracteristicas();
        }
    </script>
    <script>
        var url = <?php echo json_encode(base_url(), JSON_HEX_TAG); ?>;
    </script>
    <body>
        <form id="form" name="form" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Caracteristicas_controller/agregar_producto_caracteristicas">
            
            <input name="codigo_producto" type="hidden" id="codigo_producto"  value="<?php echo $codigoproducto ?>"/>
            <label>Codigo del Producto: </label>
            <input name="codigo_especifico" type="text" id="codigo_especifico" />
            <label>Ancho:</label>
            <input name="ancho" id="ancho">
            <label>Alto:</label>
            <input name="alto" id="alto">
            <label>Largo:</label>
            <input name="largo" id="largo">
            <label>Tamaño:</label>
            <input name="tamanno" id="tamanno">
            <label>Color:</label>
            <input type="checkbox" name="si_color" id="si_color" onclick="return check_color();" />
            <select name="color" id="color" class="form-control" hidden="" >
                <option selected="selected">Seleccionar</option>
                <?php foreach ($color as $color): ?>
                    <option value="<?php echo $color->id_color ?>">
                        <?php echo $color->color ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label>Sabor:</label>
            <input type="checkbox" name="si_sabor" id="si_sabor" onclick="return check_sabor();" />
            <select name="sabor" id="sabor" class="form-control" hidden="" >
                <option selected="selected">Seleccionar</option>
                <?php foreach ($sabor as $sabor): ?>
                    <option value="<?php echo $sabor->id_sabor ?>">
                        <?php echo $sabor->sabor ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label>Existencia:</label>
            <select name="existencia" id="existencia" >
                <option selected="selected">Seleccionar</option>
                <option>Si</option>
                <option>No</option>
            </select>
            <label>Precio:</label>
            <input name="precio" id="precio">
            <label>Selecciona Foto: </label>
            <input name="userfile" type="file" />
            <input type="submit" value="Agregar Características" onclick="//return confirmCaracteristicas();">
        </form>
    </body>

    <script>
        function check_color()
        {
            var color = document.getElementById("si_color").checked;
            //alert (check);
            if (color == true)
            {
                $("#color").show();
            } else
            {
                $("#color").hide();
            }
        }
        function check_sabor()
        {
            var sabor = document.getElementById("si_sabor").checked;
            //alert (check);
            if (sabor == true)
            {
                $("#sabor").show();
            } else
            {
                $("#sabor").hide();
            }
        }
    </script>
    <script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/validaciones.js"></script>
</html>
