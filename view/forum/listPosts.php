<?php

$posts = $result["data"]['posts'];
    
?>

<div class="section-2">
    <div class="wrapper-list-posts">
        <div class="cards" id="cards">
            <?php
            foreach($posts as $post) {
            ?>
            <div class="card">
                <p><?= $post->getText() ?></p>
                <p><?= $post->getCreationDate() ?></p>
            </div>
            <?php } ?>
        </div> 
    </div>
</div>