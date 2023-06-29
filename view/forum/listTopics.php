<?php

$topics = $result["data"]['topics'];
    
?>
<div class="section-2">
    <div class="wrapper-list-topic">
        <a href="">
            <div class="cards" id="cards">
                <?php
                    foreach($topics as $topic ){
                ?>
                    <div class='card'>
                        <h3><?=$topic->getTitle()?></h3>
                        <p><?=$topic->getCreationdate() ?></p>
                    </div>
                <?php
                    }
                ?>
            </div> 
        </a>
    </div>
</div> 




  
