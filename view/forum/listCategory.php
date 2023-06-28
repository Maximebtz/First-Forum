<?php

$categories = $result["data"]['categories'];
    
?>
<div class="section-2">
    <div class="wrapper-list-topic">
    <h2>Destinations</h2>
    <a href="">
        <div class="cards">
        <?php
            foreach($categories as $category ){
                
            }
            var_dump($categories);
            ?>
            <h3><?= $category->getName() ?></h3>
            <p><?= $category->getDescription() ?></p>
        </div>
    </a>
    
    </div>
</div>




  
