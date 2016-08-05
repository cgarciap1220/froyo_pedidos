<div class="panel panel-default">
  <div class="panel-heading"><?php echo $titulo;?></div>
  <div class="panel-body">
    <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">User</a></li>
        <li role="presentation"><a href="#company" aria-controls="company" role="tab" data-toggle="tab">Company</a></li>
        <li role="presentation"><a href="#address" aria-controls="address" role="tab" data-toggle="tab">Address</a></li>
      </ul>
    <!-- inicio formulario -->
    <form action="" method="POST">
              <!-- Tab panes -->
      <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="user">
                <div class="contenedor-formulario">
                    <!--correo -->
                    <div class="form-group">
                        <label for="empresa">User</label>
                        <input name="correo" type="email" class="form-control" id="correo" placeholder="Enter your E-mail" required="" title="You need write valid email">
                    </div>
                    <!--Contrasena-->
                    <div class="form-group">
                        <label for="empresa">Password</label>
                        <input name="clave" type="password" class="form-control" id="clave" placeholder="Enter your password" required="" title="You need rewrite your password">
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="company">
                <div class="contenedor-formulario">
                     <!--nombre de la empresa-->
                    <div class="form-group">
                        <label for="empresa">Company</label>
                        <input name="compania" type="text" class="form-control" id="compania" placeholder="company's name" autofocus="" required="" title="You need write company's name">
                    </div>
                    <!--nombre del contacto-->
                    <div class="form-group">
                        <label for="empresa">Contact's Name</label>
                        <input name="contacto" type="text" class="form-control" id="contacto" placeholder="Contact's Name" required="" title="You need write contact's name">
                    </div>
                    <!--telefono-->
                    <div class="form-group">
                        <label for="empresa">Contact's telephone</label>
                        <input name="telefono" type="tel" class="form-control" id="telefono" placeholder="Telephone's contact" required="" title="You need write contact's telephone">
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
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <!--ciudad-->
                        <div class="form-group">
                            <label for="ciudad">City</label>
                            <input name="ciudad" type="text" class="form-control" id="ciudad" placeholder="City" required="" title="Confirm your city">
                        </div>
                        <!--Zip Code-->
                         <div class="form-group">
                            <label for="state">Zip Code</label>
                            <input name="zipcode" type="text" class="form-control" id="zipcode" placeholder="Zip code" required="" title="Enter your Zip Code ">
                        </div>
                        <!--direccion-->
                        <div class="form-group">
                            <label for="empresa">Address</label>
                            <input name="direccion" type="text" class="form-control" id="company" placeholder="Address" required="" title="Confirm your address">
                        </div>
                        <!--campo seguridad-->
                        <input type="hidden" name="login" value="ok">
                        <!--boton registrarse-->
                        <input type="submit" class="btn btn-primary" value="Register now">
                </div>
            </div>
      </div>  
    </form>
    <!-- final formulario -->


  </div>
</div>