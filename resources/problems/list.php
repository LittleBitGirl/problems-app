<?php defined('__ROOT__') OR exit('403 forbidden'); ?>

<div class="row">
    <?php foreach ($this->problems as $problem){
        include('card.php');
    }?>
</div>