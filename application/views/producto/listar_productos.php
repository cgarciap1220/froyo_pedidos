

Product



<a href=" <?php base_url() ?>Productos_controller/vista_agregar_producto" class="btn btn-primary " id="editable-sample_new" data-toggle="tooltip"pagina_agregar_producto data-original-title="">Nuevo <i class="fa fa-plus"></i></a>


<table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
    <thead>
        <tr role="row">
            <th role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" style="width: auto;">Codigo del Producto</th>
            <th role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" style="width: auto;">Nombre del Producto</th>
            <th role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" style="width: auto;">Categoria</th>
            <th role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" style="width: auto">Subcategoria</th>
            <th class="sinpadin" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 3%;"></th>
            <th class="sinpadin" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 3%;"></th>
        </tr>
    </thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php foreach ($productos as $prod): ?>
            <tr class="odd">
                <td><?php echo $prod->codigo_producto; ?></td>
                <td><?php echo $prod->nombre_producto; ?></td>
                <td><?php echo $prod->categoria_id; ?></td>
                <td><?php echo $prod->subcategoria_id; ?></td>
                <td>
                    <a href=" <?php base_url() ?>/froyo_pedidos/Productos_controller/vista_modificar_producto/<?php echo $prod->codigo_producto; ?>" class="btn btn-warning btn-xs tooltips" id="editable-sample_new" data-placement="bottom" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                </td>
                <td>
                    <a href=" <?php base_url() ?>/froyo_pedidos/Productos_controller/quitar_productos/<?php echo $prod->codigo_producto; ?>" class="btn btn-danger btn-xs tooltips" id="editable-sample_new" data-placement="bottom" data-toggle="tooltip" data-original-title="Eliminar" onclick="return confirm('Estás seguro que deseas eliminar el registro?');"><i class="fa fa-minus"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>    
    </tbody>
</table>
