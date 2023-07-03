<?php

$posts = $result["data"]['posts'];
$topic = null;
?>

<div class="section-2">
    <div class="wrapper-posts">
        <div class="posts" id="posts">
            <?php
            $firstUser = true; // Variable pour garder une trace du premier utilisateur
            foreach($posts as $post) {
                if ($topic === null) {
                    $topic = $post->getTopic();
                    echo "<div class='description'>";
                    echo "<h1 class='little-title'>" . $topic->getTitle() . "</h1>";
                    echo "<article>" . $topic->getDescription() . "</article>";
                    echo "</div>";
                }
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
        </div> 
        
        <input type="button" class="new-msg-btn" value="Nouveau message"></input>
        <form action="" id="btn-convert-msg">
            <textarea class="new-msg-text hidden" placeholder="Ecrire ici..."></textarea>
            <button type="submit" class="msg-sub-btn"  ><img src="./public/img/icons8-envoyé-24.png" alt=""></button>
        </form>
    </div>
</div>
<script>
    const newMsgBtn = document.querySelector('.new-msg-btn');
    const newMsgTextarea = document.querySelector('#btn-convert-msg');

    function convertBtnToTextarea() {
        // Rendre le bouton invisible
        newMsgBtn.style.display = 'none';
    
        // Rendre la zone de texte visible
        newMsgTextarea.style.display = 'block';
    }

    newMsgBtn.addEventListener('click', function() {
        console.log(convertBtnToTextarea())
    });
</script>
