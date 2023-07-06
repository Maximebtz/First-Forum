<?php

$categories = $result["data"]['categories'];
    
?>
<div class="section-2">
    <div class="wrapper-list">
        <input type="button" class="new-msg-btn" value="Nouvelle Categorie"></input>
        <form action="index.php?ctrl=forum&action=addCategory" method="post" class="btn-convert-msg">
            <label for='name-category'>Titre :</label>
            <input class='new-title-topic' type='text' name='name' id='name-category'>
            <label for='description-category'>Description :</label>
            <textarea class="new-msg-text hidden" name="description-category" placeholder="Ecrire ici..."></textarea>
            <button type="submit" name="addCategory" class="msg-sub-btn"  ><img src="./public/img/icons8-envoyé-24.png" alt=""></button>
        </form>
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
</div>
<script>
    const newMsgBtn = document.querySelector('.new-msg-btn');
    const newMsgTextarea = document.querySelector('.btn-convert-msg');

    function convertBtnToTextarea() {
        // Rendre le bouton invisible
        newMsgBtn.style.transition = 'all 2s ease-in-out'
        newMsgTextarea.style.transition = 'all 2s ease-in-out';
        newMsgBtn.style.display = 'none';
        // Rendre la zone de texte visible
        newMsgTextarea.style.display = 'flex';
    }

    newMsgBtn.addEventListener('click', function() {
        console.log(convertBtnToTextarea())
    });
</script>




  
