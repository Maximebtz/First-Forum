<?php

$categories = $result["data"]['categories'];
    
?>
<div class="section-2">
    <div class="wrapper-list-topic">
    <h2>Destinations</h2>
        <div class="cards">
        <?php
            foreach($categories as $category ){
        ?>
                <a href="index.php?ctrl=forum&action=listTopics&id=">
                    <div class='card'>
                        <h3><?= $category->getName() ?> :</h3>
                        <p><?= $category->getDescription() ?></p>
                    </div>
                </a>
        <?php
            }
        ?>
        </div>
    </div>
   





  
