<?php

$topics = $result["data"]['topics'];
// $categories = $result["data"]['categories'];

?>
<div class="section-2">
    <div class="wrapper-list-topic">
        <button>Créer un nouveau forum</button>
        <div class="cards" id="cards">
            <?php
                foreach($topics as $topic){
                    
            ?>
                <a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>">
                    <div class='card'>
                        <h3><?= $topic->getTitle() ?></h3>
                        <p><?= $topic->getCreationDate() ?></p>
                    </div>
                </a>
            <?php
                }
            ?>
        </div> 
    </div>
</div>




  
