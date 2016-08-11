<div class="panel panel-default">
  <div class="panel-heading"><?php echo $titulo;?></div>
  <div class="panel-body">
    <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#category" aria-controls="category" role="tab" data-toggle="tab">Category</a></li>
      </ul>
    <!-- inicio formulario -->
    <form action="<?php echo base_url();?>Categoria_controller/ingresar_modificacion_categoria/<?php echo $id;?>" method="POST">
    <?php   
      foreach ($query as $key ) {
    ?>
              <!-- Tab panes -->
      <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="category">
                <div class="contenedor-formulario">
                    <!--Contrasena-->
                    <div class="form-group">
                        <label for="empresa">Category</label>
                        <input name="categoria" type="text" class="form-control" id="categoria" placeholder="Enter Category" required="" title="You need rewrite a category" value="<?php echo $key->categoria;?>">
                    </div>
                    <!--campo seguridad-->
                    <input type="hidden" name="login" value="ok">
                    <!--boton registrarse-->
                    <input type="submit" class="btn btn-primary" value="Update Category">
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