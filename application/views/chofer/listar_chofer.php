<div class="panel panel-default">
  <div class="panel-heading"><?php echo $titulo;?></div>
  <div class="panel-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">List Drivers</a></li>
    </ul>
              <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="user">
            <?php
                if (isset($vacio)) {
                        ?>
                            <h1 class="text-center"><?php echo $vacio;?></h1>
                        <?php
                }elseif(isset($query)){
                    ?>
                      <table class="table table-bordered" id="lista_usuarios">
                            <tr class="active text-center">
                              <td><strong>Name</strong></td>
                              <td><strong>ID</strong></td>
                              <td><strong>Address</strong></td>
                              <td><strong>Phone</strong></td>
                              <td><strong>Driver's license</strong></td>
                              <td><strong>Expiration date </strong></td>
                              <td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>
                              <td><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
                            </tr>

                                <?php
                                  foreach ($query as $key){
                                        ?>
                                    <tr>
                                        <td><?php echo $key->nombre?></td>
                                        <td><?php echo $key->dpi?></td>
                                        <td><?php echo $key->direccion?></td>
                                        <td><?php echo $key->telefono?></td>
                                        <td><?php echo $key->no_licencia?></td>
                                        <td><?php echo $key->fecha_vencimiento?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url();?>Chofer_controller/vista_modificar_chofer/<?php echo $key->id_chofer?>">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:eliminar('<?php echo base_url();?>Chofer_controller/eliminar_chofer/<?php echo $key->id_chofer?>')">
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
</div>