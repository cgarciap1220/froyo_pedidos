<script>
    var url = <?php echo json_encode(base_url(), JSON_HEX_TAG); ?>;
</script>
<script>
    window.onload = function () {
        loadCaracteristicas();
    }
</script>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo $titulo; ?></div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#category" aria-controls="category" role="tab" data-toggle="tab">Product Features</a></li>
        </ul>
        <!-- inicio formulario -->
        <form action="<?php echo base_url()?>/caracteristicas_controller/agregar_producto_caracteristicas_varios/" method="POST" enctype="multipart/form-data" id="insertar_caracteristicas">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="category" enctype="multipart/form-data">
                    <div class="contenedor-formulario">
                        <!--codigo_producto-->
                        <!--<div class="form-group">
                            <label for="state">Product code</label>
                            <input name="codigo_producto" type="text" class="form-control" id="codigo_producto" placeholder="Enter the product code" required="" title="You need rewrite a product code">
                        </div>-->
                        <!--nombre_producto-->
                        <div class="form-group">
                            <input name="codigo_producto" type="hidden" id="codigo_producto"  value="<?php echo $codigoproducto ?>"/>
                            <label>Product Code </label>
                            <input name="codigo_especifico" type="text" class="form-control" id="codigo_especifico" placeholder="Enter product code" required="" title="You need rewrite a product code">
                        </div>
                        <!--nombre_producto-->
                        <div class="form-group">
                            <label for="empresa">Width</label>
                            <input name="ancho" type="text" class="form-control" id="ancho" placeholder="Enter product width" required="" title="You need rewrite a product width"> 
                        </div>
                        <div class="form-group">
                            <label for="empresa">High</label>
                            <input name="alto" type="text" class="form-control" id="alto" placeholder="Enter product high" required="" title="You need rewrite a product high"> 
                        </div>
                        <div class="form-group">
                            <label for="empresa">Long</label>
                            <input name="largo" type="text" class="form-control" id="largo" placeholder="Enter product long" required="" title="You need rewrite a product long"> 
                        </div>
                        <div class="form-group">
                            <label for="empresa">Size</label>
                            <input name="tamanno" type="text" class="form-control" id="tamanno" placeholder="Enter product size" required="" title="You need rewrite a product size"> 
                        </div>
                        <div class="form-group" id="sugcategoria">
                            <label>Color:</label>
                            <input type="checkbox" name="si_color" id="si_color" onclick="return check_color();" />
                            <select name="color" id="color" class="form-control" hidden="" >
                                <option selected="selected">Select Color</option>
                                <?php foreach ($color as $color): ?>
                                    <option value="<?php echo $color->id_color ?>">
                                        <?php echo $color->color ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Flavor</label>
                            <input type="checkbox" name="si_sabor" id="si_sabor" onclick="return check_sabor();" />
                            <select name="sabor" id="sabor" class="form-control" hidden="" >
                                <option selected="selected">Select Flavor</option>
                                <?php foreach ($sabor as $sabor): ?>
                                    <option value="<?php echo $sabor->id_sabor ?>">
                                        <?php echo $sabor->sabor ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">Existence</label>
                            <select name="existencia" id="existencia" class="form-control">
                                <option selected="selected">Select Existence</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="empresa">Price</label>
                            <input name="precio" type="text" class="form-control" id="precio" placeholder="Enter product price" required="" title="You need rewrite a product price"> 
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <input type="text" class="form-control" readonly="" name="userfile" id="userfile" required="">
                            <label class="input-group-btn">
                                <span class="btn btn-default">
                                    Browse… <input type="file" style="display: none;" multiple=multiple"" name="userfile" id="userfile">
                                </span>
                            </label>
                        </div>
                            <!--<label>Select Photo</label>
                            <input name="userfile" type="file" id="userfile" required=""/>-->
                        </div>

                        <!--campo seguridad-->
                        <input type="hidden" name="login" value="ok">
                        <!--boton registrarse-->
                        <input type="submit" class="btn btn-primary" value="Add Product Features" onclick="return confirmCaracteristicas();">
                    </div>
                </div>
            </div>  
        </form>
        <!-- final formulario -->


    </div>
</div>


