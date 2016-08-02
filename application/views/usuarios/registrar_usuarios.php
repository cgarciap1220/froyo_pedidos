<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container top">
            <div class="row">
                <div class="col-md-12"> 
                    <h1 class="text-center text-muted">Register</h1>
                </div>
                <!--formulario de registro-->

                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center bg-danger" style="padding:10px;">Fed Ex will not send to P.O. Box</h2>
                    <form action="<?php echo base_url() ?>usuario_controller/adicionar_usuario/" method="POST">
                        <!--nombre de la empresa-->
                        <div class="form-group">
                            <label for="empresa">Company</label>
                            <input name="compania" type="text" class="form-control" id="company" placeholder="company's name" autofocus="" required="" title="You need write company's name">
                        </div>
                        <!--nombre del contacto-->
                        <div class="form-group">
                            <label for="empresa">Contact's Name</label>
                            <input name="nombre" type="text" class="form-control" id="company" placeholder="Contact's Name" required="" title="You need write contact's name">
                        </div>
                        <!--telefono-->
                        <div class="form-group">
                            <label for="empresa">Contact's telephone</label>
                            <input name="telefono" type="tel" class="form-control" id="company" placeholder="Telephone's contact" required="" title="You need write contact's telephone">
                        </div>
                        <!--correo -->
                        <div class="form-group">
                            <label for="empresa">E-mail</label>
                            <input name="correo" type="email" class="form-control" id="company" placeholder="this E-mail will be your username" required="" title="You need write valid email">
                        </div>
                        <!--Confirma correo-->
                        <div class="form-group">
                            <label for="empresa">Confirm E-mail</label>
                            <input name="correo_confirmacion" type="email" class="form-control" id="company" placeholder="Confirm e-mail" required="" title="You need rewrite your email">
                        </div>
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
                        <!--direccion-->
                        <div class="form-group">
                            <label for="empresa">Address</label>
                            <input name="direccion" type="text" class="form-control" id="company" placeholder="Address" required="" title="Confirm your address">
                        </div>
                        <!--statado-->
                        <div class="form-group">
                            <label for="state">Zip Code</label>
                            <input name="zipcode" type="text" class="form-control" id="zipcode" placeholder="Zip code" required="" title="Enter your Zip Code ">
                        </div>
                        <!--Contrasena-->
                        <div class="form-group">
                            <label for="empresa">Password</label>
                            <input name="clave" type="password" class="form-control" id="company" placeholder="Password" required="" title="You need rewrite your password">
                        </div>
                        <!--Confirmar contrasena-->
                        <div class="form-group">
                            <label for="empresa">Confirm your password</label>
                            <input name="clave_confirmacion" type="password" class="form-control" id="company" placeholder="Confirm your password" required="" title="You need confirm your password">
                        </div>
                        <!--campo seguridad-->
                        <input type="hidden" name="login" value="ok">
                        <!--boton registrarse-->
                        <input type="submit" class="btn btn-primary" value="Register now">
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
