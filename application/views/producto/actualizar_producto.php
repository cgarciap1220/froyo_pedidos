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
    </head>
    <body>
        <form id="form" name="form" method="post" action="<?php echo base_url() ?>productos_controller/agregar_producto">
            <label>Codigo del Producto: </label>
            <input name="codigo_producto" type="text" id="codigo_producto" />
            <label>Nombre del Producto: </label>
            <input name="nombre_producto" type="text" id="nombre_producto" />
            <label>Nivel de Ventas: </label>
            <input name="nivel_ventas" type="text" id="nivel_ventas" />
            <label>Selecciona Foto: </label>
            <input name="foto" type="file" id="foto" />
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
            <select name="categoria" id="categoria">
                <option selected="selected">Seleccionar</option>
                
            </select>
            <label>Subcategoria: </label>
            <select name="subacategoria" id="subacategoria">
                <option selected="selected">Seleccionar</option>
            </select>
            <label>Peso: </label>
            <input name="peso" type="text" id="peso" />
            <label>Descripcion: </label>
            <textarea name="descripcion" id="descripcion"></textarea>
            <button type="submit">Agregar</button>
        </form>
    </body>
</html>
