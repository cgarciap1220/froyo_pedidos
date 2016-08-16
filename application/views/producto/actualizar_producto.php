<script>
    var url = <?php echo json_encode(base_url(), JSON_HEX_TAG); ?>;

</script>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo $titulo; ?></div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#category" aria-controls="category" role="tab" data-toggle="tab">Product</a></li>
        </ul>
        <!-- inicio formulario -->
        <form id="form" name="form" enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>productos_controller/actualizar_producto/<?php echo $prod_id ?>">
            <?php foreach ($producto as $prod): ?> 
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="category" enctype="multipart/form-data">
                        <div class="contenedor-formulario">
                            
                            <!--nombre_producto-->
                            <div class="form-group">
                                <label for="empresa">Product name</label>
                                <input name="nombre_producto" type="text" class="form-control" id="nombre_producto" placeholder="Enter Product name" required="" title="You need rewrite a Product name" value="<?php echo $prod->nombre_producto ?>">
                            </div>
                            <!--nombre_producto-->
                            <div class="form-group">
                                <label for="empresa">Sales level</label>
                                <select class="form-control" id="nivel_ventas" name="nivel_ventas" required="">
                                    <option selected="selected">Select level</option>           
                                    <option value='High' <?php
                                    if (($prod->nivel_ventas) == "High") {
                                        echo'selected';
                                    }
                                    ?>>High</option>
                                    <option value='Low' <?php
                                    if (($prod->nivel_ventas) == "Low") {
                                        echo'selected';
                                    }
                                    ?>>Low</option>
                                </select>

                            </div>
                            
                            <div class="form-group">
                                <?php echo $prod->estado ?>
                                <label>State </label>
                                <select name="estado" id="estado" class="form-control" required="">
                                    <option selected="selected">Select state</option>
                                    <option value='Offered' <?php
                                    if (($prod->estado) == "Offered") {
                                        echo'selected';
                                    }
                                    ?>>Offered</option>
                                    <option value='New' <?php
                                    if (($prod->estado) == "New") {
                                        echo'selected';
                                    }
                                    ?>>New</option>
                                    <option value='Normal' <?php
                                    if (($prod->estado) == "Normal") {
                                        echo'selected';
                                    }
                                    ?>>Normal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category </label>
                                <select name="categoria" id="categoria" class="form-control" required="">
                                    <option selected="selected">Select category</option>
                                    <?php foreach ($categoria as $cat): ?>
                                        <?php if ($prod->categoria_id == $cat->id_categoria): ?>
                                            <option value="<?php echo $cat->id_categoria ?>" selected><?php echo $cat->categoria ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $cat->id_categoria ?>">
                                                <?php echo $cat->categoria ?>
                                            </option>
                                        <?php endif ?>
                                    <?php endforeach; ?> 
                                </select>
                            </div>
                            <div class="form-group" id="sugcategoria">
                                <label>Subategory </label>
                                <select name="subcategoria" id="subcategoria" class="form-control" >
                                    <option selected="selected">Select subcategory</option>
                                    <?php foreach ($subcategoria as $sub): ?>
                                        <?php if ($prod->subcategoria_id == $sub->id_subcategoria): ?>
                                            <option value="<?php echo $sub->id_subcategoria ?>" selected><?php echo $sub->subcategoria ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $sub->id_subcategoria ?>">
                                                <?php echo $sub->subcategoria ?>
                                            </option>
                                        <?php endif ?>
                                    <?php endforeach; ?> 
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="state">Description</label>
                                <textarea name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Enter the product description" title="You need rewrite a product description"><?php echo $prod->descripcion ?></textarea>
                            </div>
                            
                            <!--campo seguridad-->
                            <input type="hidden" name="login" value="ok">
                            <!--boton registrarse-->
                            <input type="submit" class="btn btn-primary" value="Update Product">
                        </div>
                    </div>
                </div>  
            <?php endforeach; ?>
        </form>
        <!-- final formulario -->


    </div>
</div>


