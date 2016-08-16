<div class="panel panel-default">
    <div class="panel-heading"><?php echo $titulo; ?></div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">List User</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="user">
                <div class="contenedor-formulario">
                    <form action="<?php echo base_url(); ?>Usuario_controller/busqueda_usuarios" method="POST">
                        <!--select de busqueda-->
                        <div class="form-group">
                            <label for="user">User type selection</label>
                            <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                                <option value="0">Select type user</option>           
                                <option value="6">froyo users</option>
                                <option value="5">User</option>         
                            </select>
                        </div>
                        <!--campo seguridad-->
                        <input type="hidden" name="busqueda" value="ok">
                        <!--boton registrarse-->
                        <input type="submit" class="btn btn-primary" name="mostrar" id="mostrar" value="List now">
                    </form>
                </div>
                <?php
                if (isset($vacio)) {
                    ?>
                    <h1 class="text-center"><?php echo $vacio; ?></h1>
                    <?php
                } elseif (isset($query)) {
                    ?>
                    <table class="table table-bordered" id="lista_usuarios">
                        <tr class="active text-center">
                            <td><strong>Name</strong></td>
                            <td><strong>E-mail(user)</strong></td>
                            <td><strong>Telephone</strong></td>
                            <td><strong>Company</strong></td>
                            <td><strong>Type user</strong></td>
                            <td><strong>Register date</strong></td>
                            <td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>
                            <td><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
                        </tr>

                        <?php
                        foreach ($query as $key) {
                            ?>
                            <tr>
                                <td><?php echo $key->nombre ?></td>
                                <td><?php echo $key->correo ?></td>
                                <td><?php echo $key->telefono ?></td>
                                <td><?php echo $key->compannia ?></td>

                                <td>
                                    <?php
                                    if ($key->rol_id == 1) {
                                        echo "Administrator";
                                    } elseif ($key->rol_id == 2) {
                                        echo "Secretary";
                                    } elseif ($key->rol_id == 3) {
                                        echo "Wherehouse";
                                    } elseif ($key->rol_id == 4) {
                                        echo "Managers";
                                    } elseif ($key->rol_id == 5) {
                                        echo "Customer";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $key->fecha_registro ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url(); ?>Usuario_controller/vista_modificar_usuario/<?php echo $key->id_usuario ?>">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:eliminar('<?php echo base_url(); ?>Usuario_controller/eliminar_usuario/<?php echo $key->id_usuario ?>')">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                }
                ?>
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