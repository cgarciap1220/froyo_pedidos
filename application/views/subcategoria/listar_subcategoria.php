<div class="panel panel-default">
  <div class="panel-heading"><?php echo $titulo;?></div>
  <div class="panel-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">List Category</a></li>
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
                            <tr class="active">
                              <td><strong>Category</strong></td>
                              <td class="text-center"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>
                              <td class="text-center"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
                            </tr>

                                <?php
                                  foreach ($query as $key){
                                  	$id_categoria = $key->id_categoria;
                                    ?>
	                                    <tr class="active">
	                                        <td colspan="3"><strong><?php echo $key->categoria;?></strong></td>

	                                    </tr>
	                                    	<?php
		                                    	for($i = 0; $i<count($subcategoria);$i++) {
                                               for($j = 0; $j<count($subcategoria[$i]);$j++) {
		                                    		if ($id_categoria == $subcategoria[$i][$j]['categoria_id']) {
		                                    			?>
				                                    		<tr>
						                                        <td><?php echo $subcategoria[$i][$j]['subcategoria']?></td>
						                                        <td class="text-center">
						                                            <a href="<?php echo base_url();?>Subcategoria_controller/vista_modificar_subcategoria/<?php echo $subcategoria[$i][$j]['id_subcategoria']?>">
						                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						                                            </a>
						                                        </td>
						                                        <td class="text-center">
						                                            <a href="javascript:eliminar('<?php echo base_url();?>Subcategoria_controller/eliminar_subcategoria/<?php echo $subcategoria[$i][$j]['id_subcategoria']?>')">
						                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						                                            </a>
						                                        </td>
						                                    </tr>
		                                    			<?php
		                                    		}
		                                    	}
                                                    }
	                                    	?>
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