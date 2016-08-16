<div class="panel panel-default">
  <div class="panel-heading"><?php echo $titulo;?></div>
  <div class="panel-body">
    <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#category" aria-controls="category" role="tab" data-toggle="tab">Category</a></li>
      </ul>
    <!-- inicio formulario -->
    <form action="<?php echo base_url();?>Subcategoria_controller/modificar_subcategoria/<?php echo $id;?>" method="POST">
    <?php
      foreach ($subquery as $subcategoria ) {
    ?>
              <!-- Tab panes -->
      <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="category">
                <div class="contenedor-formulario">
                    <div class="contenedor-formulario">
                	<!--categoria-->
                        <div class="form-group">
                            <label for="state">Category</label>
                            <select class="form-control" id="categoria_id" name="categoria_id">
                                <option value="1">Select Category</option>
                                <?php
                                    foreach ($query as $key) {
                                      ?>
                                        <option value="<?php echo $key->id_categoria;?>"
                                          <?php
                                            if($subcategoria->categoria_id == $key->id_categoria)
                                              {
                                                echo "Selected";
                                              }
                                           ?>
                                          >
                                          <?php echo $key->categoria;?>
                                        </option>
                                      <?php
                                    }
                                 ?>
                            </select>
                        </div>
                    <!--subcategoria-->
                    <div class="form-group">
                        <label for="empresa">Subcategory</label>
                        <input name="subcategoria" type="text" class="form-control" id="subcategoria" placeholder="Enter Subcategory" required="" title="You need rewrite a category" value="<?php echo $subcategoria->subcategoria;?>">
                    </div>
                    <!--campo seguridad-->
                    <input type="hidden" name="login" value="ok">
                    <!--boton registrarse-->
                    <input type="submit" class="btn btn-primary" value="Update Subcategory">
                </div>
                </div>
            </div>
      </div>
    <?php
      }
    ?>
    </form>
    <!-- final formulario -->


  </div>
</div>
