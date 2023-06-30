<?php

$posts = $result["data"]['posts'];
    
?>

<div class="section-2-posts">
    <div class="wrapper-posts">
        <div class="posts" id="posts">
        <?php
            $firstUser = true; // Variable pour garder une trace du premier utilisateur
            foreach($posts as $post) {
                $user = $post->getUser();
                $userClass = ($firstUser) ? "first-user" : "other-user"; // Classe différente pour le premier utilisateur et les autres
        ?>
            <div class="post <?php echo $userClass; ?>">
                <div class="user-info">
                    <img src="./public/img/<?= $post->getUser()->getImage() ?>" alt="<?= $post->getUser()->getUsername() ?>">
                    <div class="span-date">
                        <span class="user-name"><?= $post->getUser()->getUsername() ?></span>
                        <span><?= $post->getCreationDate() ?></span>
                    </div>
                </div>
                <p><?= $post->getText() ?></p>
            </div>
        <?php 
            $firstUser = false; // Mettre la variable à false après le premier utilisateur} 
        }
        ?>
        <button>Nouveau</button>
        </div> 
    </div>
</div>