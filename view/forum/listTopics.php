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
                <a href="">
                    <div class='card'>
                        <h3><?= $topic->getTitle() ?></h3>
                        <p><?= $topic->getCreationdate() ?></p>
                    </div>
                </a>
            <?php
                }
            ?>
        </div> 
    </div>
</div> 




  
