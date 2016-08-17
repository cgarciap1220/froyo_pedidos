<div class="panel panel-default">
  <div class="panel-heading"><?php echo $titulo;?></div>
  <div class="panel-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">List Route</a></li>
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
                              <td><strong>Route</strong></td>
                              <td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>
                              <td><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
                            </tr>
                           
                                <?php
                                  foreach ($query as $key){
                                        ?>
                                    <tr>
                                        <td><?php echo $key->ruta;?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url();?>Ruta_controller/vista_modificar_ruta/<?php echo $key->id_ruta?>">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:eliminar('<?php echo base_url();?>Ruta_controller/eliminar_camion/<?php echo $key->id_ruta?>')">
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
                // aqui link de paginacion 
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