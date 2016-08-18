<div class="panel panel-default">
  <div class="panel-heading"><?php echo $titulo;?></div>
  <div class="panel-body">
    <!-- Nav tabs -->
    <p><strong>Fill in the password field with the current password or a new one</strong></p>
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">User</a></li>
        <li role="presentation"><a href="#company" aria-controls="company" role="tab" data-toggle="tab">Company</a></li>
        <li role="presentation"><a href="#address" aria-controls="address" role="tab" data-toggle="tab">Address</a></li>
      </ul>
    <!-- inicio formulario -->
    <form action="<?php echo base_url();?>Usuario_controller/ingresar_modificacion_usuario/<?php echo $id;?>" method="POST" >
  	<?php 	
  		foreach ($query as $key ) {
    ?>
        
              <!-- Tab panes -->
      <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="user">
                <div class="contenedor-formulario">
                    <!--correo -->
                    <div class="form-group">
                        <label for="empresa">User</label>
                        <input name="correo" type="email" class="form-control" id="correo" placeholder="Enter your E-mail" required="" title="You need write valid email" value="<?php echo $key->correo;?>">
                    </div>
                    <!--Contrasena-->
                    <div class="form-group">
                        <label for="empresa">Password</label>
                        <input name="clave" type="password" class="form-control" id="clave" placeholder="Enter your password is required"  title="You need rewrite your password" value="" required="">
                    </div>
                    <!--statado-->
                        <div class="form-group">
                            <label for="state">Rol</label>
                            <select class="form-control" id="rol" name="rol">
                                <option value="0">Select State</option>           
                                <option value="1" <?php if (($key->rol_id) == "1") { echo'selected';}?>>Administrator</option>
                                <option value="2" <?php if (($key->rol_id) == "2") { echo'selected';}?>>Secretary</option>
                                <option value="3" <?php if (($key->rol_id) == "3") { echo'selected';}?>>Wherehouse</option>
                                <option value="4" <?php if (($key->rol_id) == "4") { echo'selected';}?>>Manager</option>
                                <option value="5" <?php if (($key->rol_id) == "5") { echo'selected';}?>>User</option>         
                            </select>
                        </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="company">
                <div class="contenedor-formulario">
                     <!--nombre de la empresa-->
                    <div class="form-group">
                        <label for="empresa">Company</label>
                        <input name="compania" type="text" class="form-control" id="compania" placeholder="company's name" autofocus="" required="" title="You need write company's name" value="<?php echo $key->compannia;?>">
                    </div>
                    <!--nombre del contacto-->
                    <div class="form-group">
                        <label for="empresa">Contact's Name</label>
                        <input name="contacto" type="text" class="form-control" id="contacto" placeholder="Contact's Name" required="" title="You need write contact's name" value="<?php echo $key->nombre;?>">
                    </div>
                    <!--telefono-->
                    <div class="form-group">
                        <label for="empresa">Contact's telephone</label>
                        <input name="telefono" type="tel" class="form-control" id="telefono" placeholder="Telephone's contact" required="" title="You need write contact's telephone" value="<?php echo $key->telefono;?>">
                    </div>
                </div>
            </div>
           <div role="tabpanel" class="tab-pane fade" id="address">
                <div class="contenedor-formulario">
                   <!--statado-->
                        <div class="form-group">
                            <label for="state">State</label>
                            <select class="form-control" id="abbr" name="abbr">
                                <option value="1">Select State</option>           
                                <?php foreach ($ciudad as $ciudad): ?>
                                        <?php if ($key->estado == $ciudad->id_ciudad): ?>
                                            <option value="<?php echo $ciudad->id_ciudad ?>" selected><?php echo $ciudad->nombre ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $ciudad->id_ciudad ?>">
                                                <?php echo $ciudad->nombre?>
                                            </option>
                                        <?php endif ?>
                                    <?php endforeach; ?> 
                            </select>
                        </div>
                        <!--ciudad-->
                        <div class="form-group">
                            <label for="ciudad">City</label>
                            <input name="ciudad" type="text" class="form-control" id="ciudad" placeholder="City" required="" title="Confirm your city" value="<?php echo $key->ciudad;?>" >
                        </div>
                        <!--Zip Code-->
                         <div class="form-group">
                            <label for="state">Zip Code</label>
                            <input name="zipcode" type="text" class="form-control" id="zipcode" placeholder="Zip code" required="" title="Enter your Zip Code " value="<?php echo $key->zipcode;?>">
                        </div>
                        <!--direccion-->
                        <div class="form-group">
                            <label for="empresa">Address</label>
                            <input name="direccion" type="text" class="form-control" id="company" placeholder="Address" required="" title="Confirm your address" value="<?php echo $key->direccion;?>">
                        </div>
                        <!--campo seguridad-->
                        <input type="hidden" name="login" value="ok">
                        <!--boton registrarse-->
                        <input type="submit" class="btn btn-primary" value="Update User">
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
