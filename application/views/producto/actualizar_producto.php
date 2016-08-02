<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            var url = <?php echo json_encode(base_url(), JSON_HEX_TAG); ?>;

        </script>
    </head>
    <body>
        <form id="form" name="form" enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>productos_controller/actualizar_producto/<?php echo $prod_id ?>">
            <?php foreach ($producto as $prod): ?>
                <label>Codigo del Producto: </label>
                <input name="codigo_producto" type="text" id="codigo_producto" value="<?php echo $prod->codigo_producto ?>" readonly="" />
                <label>Nombre del Producto: </label>
                <input name="nombre_producto" type="text" id="nombre_producto" value="<?php echo $prod->nombre_producto ?>"/>
                <label>Nivel de Ventas: </label>
                <input name="nivel_ventas" type="text" id="nivel_ventas" value="<?php echo $prod->nivel_ventas ?>"/>
                <select name="nivel_ventas" id="nivel_ventas">
                    <option selected="selected">Seleccionar</option>
                    <option value='Altas' <?php
                    if (($prod->nivel_ventas) == "Altas") {
                        echo'selected';
                    }
                    ?>>Altas</option>
                    <option value='Bajas' <?php
                    if (($prod->nivel_ventas) == "Bajas") {
                        echo'selected';
                    }
                    ?>>Bajas</option>
                </select>
                <?php
                if ($prod->foto_small != ""):
                    echo 'Ya tiene una imagen prestablecida, deje este campo vacio para dejar por defecto la actual.';
                    ?>
                    <label>Selecciona Foto: </label>
                    <input name="userfile" type="file" id="userfile"/>
                <?php endif; ?>
                <label>Stoke: </label>
                <select name="stoke" id="stoke">
                    <option selected="selected">Seleccionar</option>
                    <option value='Si' <?php
                    if (($prod->stoke) == "Si") {
                        echo'selected';
                    }
                    ?>>Si</option>
                    <option value='No' <?php
                    if (($prod->stoke) == "No") {
                        echo'selected';
                    }
                    ?>>No</option>
                </select>
                <label>Estado: </label>
                <select name="estado" id="estado">
                    <option selected="selected">Seleccionar</option>
                    <option value='Ofertado' <?php
                    if (($prod->estado) == "Ofertado") {
                        echo'selected';
                    }
                    ?>>Ofertado</option>
                    <option value='Novedoso' <?php
                    if (($prod->estado) == "Novedoso") {
                        echo'selected';
                    }
                    ?>>Novedoso</option>
                    <option value='Normal' <?php
                    if (($prod->estado) == "Normal") {
                        echo'selected';
                    }
                    ?>>Normal</option>

                </select>
                <label>Categoria: </label>
                <select name="categoria" id="categoria">
                    <option selected="selected">Seleccionar</option>
                    <?php foreach ($categoria as $cat): ?>
                        <?php if ($prod->categoria_id == $cat->id_categoria): ?>
                            <option value="<?php echo $cat->id_categoria ?>" selected><?php echo $cat->categoria ?></option>
                        <?php else: ?>
                            <option value="<?php echo $cat->id_categoria ?>">
                                <?php echo $cat->categoria ?>
                            </option>
                        <?php endif ?>
                    <?php endforeach; ?> 
                </select>
                <label>Subcategoria: </label>
                <select name="subcategoria" id="subcategoria">
                    <option selected="selected">Seleccionar</option>
                    <?php foreach ($subcategoria as $sub): ?>
                        <?php if ($prod->subcategoria_id == $sub->id_subcategoria): ?>
                            <option value="<?php echo $sub->id_subcategoria ?>" selected><?php echo $sub->subcategoria ?></option>
                        <?php else: ?>
                            <option value="<?php echo $sub->id_subcategoria ?>">
                                <?php echo $sub->subcategoria ?>
                            </option>
                        <?php endif ?>
                    <?php endforeach; ?> 
                </select>
                <label>Peso: </label>
                <input name="peso" type="text" id="peso" value="<?php echo $prod->peso ?>" />
                <label>Descripcion: </label>
                <textarea name="descripcion" id="descripcion" value=""><?php echo $prod->descripcion ?></textarea>
                <button type="submit">Actualizar</button>
            <?php endforeach; ?>
        </form>
    </body>
    <script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/miscripts.js"></script>
</html>
