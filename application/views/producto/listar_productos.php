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
                        <td><strong>Stoke</strong></td>
                        <td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>
                        <td><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
                    </tr>

                    <?php foreach ($productos as $prod): ?>
                    <tr>
                        <td><?php echo $prod->nombre_producto; ?></td>
                        <td><?php echo $prod->categoria; ?></td>
                        <td><?php echo $prod->subcategoria; ?></td>
                        <td><?php echo $prod->nivel_ventas; ?></td>
                        <td><?php echo $prod->stoke; ?></td>
                        <td class="text-center">
                            <a href="<?php base_url() ?>/froyo_pedidos/Productos_controller/vista_modificar_producto/<?php echo $prod->codigo_producto; ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="javascript:eliminar('<?php base_url() ?>/froyo_pedidos/Productos_controller/eliminar_producto/<?php echo $prod->codigo_producto; ?>')">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                            
                            <a href="<?php base_url() ?>/froyo_pedidos/Productos_controller/eliminar_producto/<?php echo $prod->codigo_producto; ?>">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>

                </table>
                
            </div>
            <div class="row">

                <div class="col-sm-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                        <ul class="pagination">
                            <!-- <li class="paginate_button previous disabled" aria-controls="datatable" tabindex="0" id="datatable_previous">
                                 <a href="#">Previous</a>
                             </li>
                             <li class="paginate_button active" aria-controls="datatable" tabindex="0">
                                 <a href="#">1</a>
                             </li>
                             <li class="paginate_button " aria-controls="datatable" tabindex="0">
                                 <a href="#">2</a>
                             </li>
                             <li class="paginate_button " aria-controls="datatable" tabindex="0">
                                 <a href="#">3</a>
                             </li>
                             <li class="paginate_button " aria-controls="datatable" tabindex="0">
                                 <a href="#">4</a>
                             </li>
                             <li class="paginate_button " aria-controls="datatable" tabindex="0">
                                 <a href="#">5</a>
                             </li>
                             <li class="paginate_button " aria-controls="datatable" tabindex="0">
                                 <a href="#">6</a>
                             </li>
                             <li class="paginate_button next" aria-controls="datatable" tabindex="0" id="datatable_next">
                                 <a href="#">Next</a>
                             </li>-->

                            <?php
                            /* Se imprimen los números de página */
                            echo $this->pagination->create_links();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="datatable-keytable_paginate">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>