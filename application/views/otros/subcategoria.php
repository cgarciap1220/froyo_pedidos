
    <div  id="subcategoria">
        <select name="subcategoria" id="subcategoria" class="form-control">
            <option selected="selected">Seleccionar</option>
            <?php foreach ($subcategoria as $sub): ?>
                <option value="<?php echo $sub->id_subcategoria ?>">
                    <?php echo $sub->subcategoria ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
