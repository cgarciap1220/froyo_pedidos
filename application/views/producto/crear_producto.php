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
        <form action="<?php echo base_url() ?>productos_controller/agregar_producto" method="POST">
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
                            <label for="empresa">Product name</label>
                            <input name="nombre_producto" type="text" class="form-control" id="nombre_producto" placeholder="Enter Product name" required="" title="You need rewrite a Product name">
                        </div>
                        <!--nombre_producto-->
                        <div class="form-group">
                            <label for="empresa">Sales level</label>
                            <select class="form-control" id="nivel_ventas" name="nivel_ventas">
                                <option value="1">Select level</option>           
                                <option value="high">High</option>
                                <option value="low">Low</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="empresa">Stoke</label>
                            <select class="form-control" name="stoke" id="stoke">
                                <option selected="selected">Select stoke</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>State </label>
                            <select name="estado" id="estado" class="form-control">
                                <option selected="selected">Select state</option>
                                <option>Offered</option>
                                <option>New</option>
                                <option>Normal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category </label>
                            <select name="categoria" id="categoria" class="form-control">
                                <option selected="selected">Select category</option>
                                <?php foreach ($categoria as $cat): ?>
                                    <option value="<?php echo $cat->id_categoria ?>">
                                        <?php echo $cat->categoria ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group" id="sugcategoria">
                            <label>Subategory </label>
                            <select name="subcategoria" id="subcategoria" class="form-control" >
                                <option selected="selected">Select subcategory</option>
                                <?php foreach ($subcategoria as $sub): ?>
                                    <option value="<?php echo $sub->id_subcategoria ?>">
                                        <?php echo $sub->subcategoria ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">Weight</label>
                            <input name="peso" type="text" id="peso" class="form-control" placeholder="Enter the product weight" required="" title="You need rewrite a product weight" />
                        </div>
                        <div class="form-group">
                            <label for="state">Description</label>
                            <textarea name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Enter the product description" required="" title="You need rewrite a product description"></textarea>
                        </div>

                        <!--campo seguridad-->
                        <input type="hidden" name="login" value="ok">
                        <!--boton registrarse-->
                        <input type="submit" class="btn btn-primary" value="Add Product">
                    </div>
                </div>
            </div>  
        </form>
        <!-- final formulario -->


    </div>
</div>


