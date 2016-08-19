<div class="panel panel-default">
    <div class="panel-heading"><?php echo $titulo; ?></div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#category" aria-controls="category" role="tab" data-toggle="tab">Route</a></li>
        </ul>
        <!-- inicio formulario -->
        <?php 
        foreach ($ruta as $rut): ?>
            <form action="<?php echo base_url() ?>Ruta_controller/actualizar_ruta/<?php echo $rut->id_ruta?>" method="POST">
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
                                <label for="ruta">Route name</label>
                                <input name="ruta" type="text" class="form-control" id="ruta" placeholder="Enter route name" required="" title="You need rewrite a route name" value="<?php echo $rut->ruta; ?>">
                            </div>
                            <!--nombre_producto-->
                            <div class="form-group">
                                <label for="ciudad">Cities of the route</label>
                                <!--<select class="form-control" id="ciudad" name="ciudad[]" multiple="">

                                </select>-->
                                <select class="selectpicker form-control" multiple="" id="ciudad" name="ciudad[]" data-style="btn-white">
                                    <?php
                                    foreach ($ciudad as $ciud):
                                        if (in_array($ciud, $ruta_ciudad)):
                                            ?>
                                            <option value="<?php echo $ciud->id_ciudad ?>"<?php echo'selected';
                                            ?>><?php echo $ciud->nombre ?></option>
                                                <?php else: ?> 
                                            <option value="<?php echo $ciud->id_ciudad ?>">
                                                <?php echo $ciud->nombre ?>
                                            </option>
                                        <?php
                                        endif;

                                    endforeach;
                                    ?>        
                                </select>

                            </div>

                            <!--campo seguridad-->
                            <input type="hidden" name="login" value="ok">
                            <!--boton registrarse-->
                            <input type="submit" class="btn btn-primary" value="Update Route">
                        </div>
                    </div>
                </div>  
            </form>
            <!-- final formulario -->
        <?php endforeach; ?>

    </div>
</div>