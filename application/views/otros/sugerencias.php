<div id="suggestions">
    <ul id="name-list">

        <?php foreach ($cliente as $elem):
            ?>
            <li onClick="selectName(<?php echo json_encode($elem); ?>)"><?php echo utf8_encode($elem->nombre); ?></li>
            <?php
        endforeach;
        ?>

    </ul>
</div>s
