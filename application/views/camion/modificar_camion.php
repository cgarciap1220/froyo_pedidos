<div class="panel panel-default">
    <div class="panel-heading"><?php echo $titulo; ?></div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#category" aria-controls="category" role="tab" data-toggle="tab">Truck</a></li>
        </ul>
        <!-- inicio formulario -->
        <?php foreach ($camion as $cam): ?>
            <form action="<?php echo base_url() ?>Camion_controller/actualizar_camion/<?php echo $cam->id_camion ?>" method="POST">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="category">
                        <div class="contenedor-formulario">
                            <div class="form-group">
                                <label for="empresa">Truck Make</label>
                                <input name="marca" type="text" class="form-control" id="marca" placeholder="Enter truck make" required="" title="You need rewrite the mark of truck" value="<?php echo $cam->marca ?>">
                            </div>
                            <!--nombre_producto-->
                            <div class="form-group">
                                <label for="state">Model truck</label>
                                <input name="modelo" type="text" id="modelo" class="form-control" placeholder="Enter the model truck" required="" title="You need rewrite the model truck" value="<?php echo $cam->modelo ?>" />
                            </div>
                            <div class="form-group">
                                <label for="state">Licence plate</label>
                                <input name="placa" type="text" class="form-control" id="placa" placeholder="Enter the licence plate" required="" title="You need rewrite a licence plate" value="<?php echo $cam->placa ?>">
                            </div>
                            <div class="form-group">
                                <label for="ruta">Truck routes</label>
                                <select class="selectpicker form-control" multiple="" id="ruta" name="ruta[]" data-style="btn-white">
                                    <?php
                                    foreach ($ruta as $rut):
                                        if (in_array($rut, $ruta_camion)):
                                            ?>
                                            <option value="<?php echo $rut->id_ruta ?>"<?php echo'selected';
                                            ?>><?php echo $rut->ruta ?></option>
                                                <?php else: ?> 
                                            <option value="<?php echo $rut->id_ruta ?>">
                                                <?php echo $rut->ruta ?>
                                            </option>
                                        <?php
                                        endif;

                                    endforeach;
                                    ?>  
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ruta">Truck routes</label>
                                <select class="selectpicker form-control" multiple="" id="chofer" name="chofer[]" data-style="btn-white">
                                   <?php foreach ($chofer as $chof):
                                        if (in_array($chof, $chofer_camion)):
                                            ?>
                                            <option value="<?php echo $chof->id_chofer ?>"<?php echo'selected';
                                            ?>><?php echo $chof->nombre ?></option>
                                                <?php else: ?> 
                                            <option value="<?php echo $chof->id_chofer ?>">
                                                <?php echo $chof->nombre ?>
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
                            <input type="submit" class="btn btn-primary" value="Update Truck">
                        </div>
                    </div>
                </div>  
            </form>
            <!-- final formulario -->
        <?php endforeach; ?>

    </div>
</div>


