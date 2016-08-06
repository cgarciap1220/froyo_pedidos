
  `no_licencia`
  `fecha_vencimiento`
  <div class="panel panel-default">
    <div class="panel-heading"><?php echo $titulo; ?></div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#category" aria-controls="category" role="tab" data-toggle="tab">Driver</a></li>
        </ul>
        <!-- inicio formulario -->
        <form action="<?php echo base_url() ?>Camion_controller/agregar_camion" method="POST">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="category">
                    <div class="contenedor-formulario">
                        <!--codigo_producto-->
                        <!--<div class="form-group">
                            <label for="state">Product code</label>
                            <input name="codigo_producto" type="text" class="form-control" id="codigo_producto" placeholder="Enter the product code" required="" title="You need rewrite a product code">
                        </div>-->
                        <!--nombre_producto-->
                       
                        <div class="form-group">
                            <label for="nombre">Driver name</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Enter driver name" required="" title="You need rewrite a driver name">
                        </div>
                        <!--nombre_producto-->
                        <div class="form-group">
                            <label for="dpi">Driver ID</label>
                            <input name="dpi" type="text" id="dpi" class="form-control" placeholder="Enter the driver ID" required="" title="You need rewrite a driver ID" />
                        </div>
                        <div class="form-group">
                            <label for="direccion">Driver address</label>
                            <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Enter the driver address" required="" title="You need rewrite a driver address">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Driver phone number</label>
                            <input name="telefono" type="text" class="form-control" id="telefono" placeholder="Enter driver phone number" required="" title="You need rewrite the phone number of driver">
                        </div>
                        <div class="form-group">
                            <label for="no_licencia">driver's license number</label>
                            <input name="no_licencia" type="text" class="form-control" id="no_licencia" placeholder="Enter driver phone number" required="" title="You need rewrite the phone number of driver">
                        </div>

                        <!--campo seguridad-->
                        <input type="hidden" name="login" value="ok">
                        <!--boton registrarse-->
                        <input type="submit" class="btn btn-primary" value="Add Driver">
                    </div>
                </div>
            </div>  
        </form>
        <!-- final formulario -->


    </div>
</div>