<div class="panel panel-default">
    <div class="panel-heading"><?php echo $titulo; ?></div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#category" aria-controls="category" role="tab" data-toggle="tab">Driver</a></li>
        </ul>
        <!-- inicio formulario -->
        <form action="<?php echo base_url() ?>Chofer_controller/agregar_chofer" method="POST">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="category">
                    <div class="contenedor-formulario">

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
                            <label for="no_licencia">Driver's license number</label>
                            <input name="no_licencia" type="text" class="form-control" id="no_licencia" placeholder="Enter the number of driver's license" required="" title="You need rewrite the driver's license number">
                        </div>
                        <div class="form-group">
                            <label for="fecha_vencimiento">Expiration date driver's license number</label>
                            <input name="fecha_vencimiento" type="date"  class="form-control" id="fecha_vencimiento" placeholder="dd/mm/yyyy" required="" title="You need rewrite the expiration date driver's license number">
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