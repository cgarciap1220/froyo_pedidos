<div class="panel panel-default">
    <div class="panel-heading"><?php echo $titulo; ?></div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">List Product</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="user">

                <table class="table table-bordered" id="lista_usuarios">
                    <tr class="active text-center">
                        <td><strong>Product Name</strong></td>
                        <td><strong>Category</strong></td>
                        <td><strong>Subategory</strong></td>
                        <td><strong>Sales level</strong></td>
                        <td><strong>Description</strong></td>
                        <td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>
                        <td><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
                    </tr>

                    <?php foreach ($productos as $prod): ?>
                        <tr>
                            <td><?php echo $prod->nombre_producto; ?></td>
                            <td><?php echo $prod->categoria; ?></td>
                            <td><?php echo $prod->subcategoria; ?></td>
                            <td><?php echo $prod->nivel_ventas; ?></td>
                            <td><?php echo $prod->descripcion; ?></td>
                            <td class="text-center">
                                <a href="<?php base_url() ?>/froyo_pedidos/Productos_controller/vista_modificar_producto/<?php echo $prod->codigo_producto; ?>">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="javascript:eliminar('<?php base_url() ?>/froyo_pedidos/Productos_controller/eliminar_producto/<?php echo $prod->codigo_producto; ?>')">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>

                </table>
                <div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate" style="text-align: center">
                    <ul class="pagination" >
                        <?php
                        /* Se imprimen los números de página */
                        echo $this->pagination->create_links();
                        ?>
                    </ul>
                </div>  
            </div>



        </div>



    </div>
</div>