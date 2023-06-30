<?php

$categories = $result["data"]['categories'];
    
?>
<div class="section-2">
    <div class="wrapper-list-categories">
            <button>Créer un nouveau forum</button>
            <div class="cards" id="cards" >
            <h2>Destinations</h2>
            
            <?php
                foreach($categories as $category ){
            ?>
                    <a href="index.php?ctrl=forum&action=listTopics&id=<?= $category->getId() ?>">
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
   





  
