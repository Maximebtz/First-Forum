<?php

$topics = $result["data"]['topics'];
$category = null;

?>
<div class="section-2">
    <div class="wrapper-list">
    
        <?php
            foreach($topics as $topic){
                if ($category === null) {
                    $category = $topic->getCategory();
                    echo "<div class='description'>
                            <h1>" . $category->getName() . " </h1>
                            <article>" . $category->getDescription() . "</article>
                            <input type='button' class='new-msg-btn' value='Nouveau Topic'></input>
                            <form action='index.php?ctrl=forum&action=addTopic&id=" . $category->getId() . "' method='post' class='btn-convert-msg'>
                                <label for='title-topic'>Titre :</label>
                                    <input class='new-title-topic' type='text' name='title' id='title-topic'>
                                <label for='description-topic'>Description :</label>
                                    <textarea class='new-msg-text hidden' name='description' id='description-topic' placeholder='Décrire le nouveau sujet...'></textarea>
                                <label for='post-topic'>Message :</label>
                                    <textarea class='new-msg-text hidden' name='text' id='post-topic' placeholder='Ecrire le premier message ici...'></textarea>
                                <button type='submit' name='addTopic' class='msg-sub-btn'  ><img src='./public/img/icons8-envoyé-24.png' alt=''></button>
                            </form>
                        </div>
                        <div class='cards' id='cards'>"; 
                        // echo "<pre>";
                        // var_dump($category);
                        // echo "</pre>";
                }
            ?>
            <a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>">
                <div class='card'>
                    <button class="delete">x</button>
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
<script>

    document.getElementById("cards").onmousemove = e => {
        for(const card of document.getElementsByClassName("card")) {
        const rect = card.getBoundingClientRect(),
                x = e.clientX - rect.left,
                y = e.clientY - rect.top;
    
        card.style.setProperty("--mouse-x", `${x}px`);
        card.style.setProperty("--mouse-y", `${y}px`);
        };
    }


    const newMsgBtn = document.querySelector('.new-msg-btn');
    const newMsgTextarea = document.querySelector('.btn-convert-msg');

    function convertBtnToTextarea() {
        // Rendre le bouton invisible
        newMsgBtn.style.display = 'none';
        // Rendre la zone de texte visible
        newMsgTextarea.style.display = 'flex';
    }

    newMsgBtn.addEventListener('click', function() {
        console.log(convertBtnToTextarea())
    });
</script>