<!--main content start-->
<section id="main-content"> 
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Productos

                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <a href=" <?php base_url() ?>/froyo_pedidos/Productos_controller/pagina_agregar_producto" class="btn btn-primary " id="editable-sample_new" data-toggle="tooltip" data-original-title="">Nuevo <i class="fa fa-plus"></i></a>
                                </div>
                                <!--<div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Herramientas <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Imprimir</a></li>
                                        <li><a href="#">Guardar como PDF</a></li>
                                        <li><a href="#">Exportar a Excel</a></li>
                                    </ul>
                                </div>-->
                            </div>
                            <div class="space15"></div>
                            <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="row"><div class="col-lg-6">
                                        </br>
                                    </div>

                                </div>
                                <?php if ($valor != False): ?>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="0">
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
                                                    <td><?php echo $prod->categoria; ?></td>
                                                    <td><?php echo $prod->subcategoria; ?></td>
                                                    <td>
                                                        <a href=" <?php base_url() ?>/froyo_pedidos/Productos_controller/pagina_modificar_producto/<?php echo $prod->codigo_producto; ?>">Editar</a>
                                                    </td>
                                                    <td>
                                                        <a href=" <?php base_url() ?>/froyo_pedidos/Productos_controller/eliminar_producto/<?php echo $prod->codigo_producto; ?>"  onclick="return confirm('Estás seguro que deseas eliminar el registro?');">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>    
                                        </tbody>
                                    </table>
                                <?php
                                else:
                                    echo $productos;
                                endif;
                                ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="dataTables_info" id="editable-sample_info"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dataTables_paginate paging_bootstrap pagination">
                                            <ul>
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
                    </div>
                </section>
            </div>
        </div>
        <!--page end-->
    </section>
</section>
<!--main content end-->
