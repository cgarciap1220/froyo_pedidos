<div class="panel panel-default">
  <div class="panel-heading"><?php echo $titulo;?></div>
  <div class="panel-body">
    <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">Contact</a></li>
     </ul>
    <!-- inicio formulario -->
    <form action="<?php echo base_url();?>Contacto_controller/enviar_contacto" method="POST" >
              <!-- Tab panes -->
      <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="user">
                <div class="contenedor-formulario">
                    <!--correo -->
                    <div class="form-group">
                        <label for="compania">Company</label>
                        <input name="compania" type="text" class="form-control" id="compania" placeholder="Compania" required="" title="You need enter your company's name">
                    </div>
                    <!--Contrasena-->
                    <div class="form-group">
                        <label for="contacto">Name</label>
                        <input name="contacto" type="text" class="form-control" id="contacto" placeholder="Enter your name" required="" title="You need rewrite your password">
                    </div>
                    <!--Contrasena-->
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Enter your E-mail" required="" title="You need rewrite your password">
                    </div>

                    <!--Contrasena-->
                    <div class="form-group">
                        <label for="email">Message</label>
        							  <textarea class="form-control" rows="3" name="mensaje" id="mensaje"></textarea>                    
        						</div>
					       </div>
                   <!--campo seguridad-->
                    <input type="hidden" name="login" value="ok">
                    <!--boton registrarse-->
                    <input type="submit" class="btn btn-primary" value="Contact us now">
                </div>
            </div>

      </div>  
    </form>
    <!-- final formulario -->


  </div>
</div>