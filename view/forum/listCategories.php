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
                <div class="delete-form">
                    <form class="delete-action" action="">
                        <p>Êtes-vous sûr de vouloir supprimer ?</p>
                        <input class="conf-delete" type="submit" value="Supprimer">
                        <input class="dont-delete" type="button" value="Non">
                    </form>
                </div>
                <a href="index.php?ctrl=forum&action=listTopics&id=<?= $category->getId() ?>">
                    <div class='card'>
                        <button class="delete-btn" data-card-id="<?= $category->getId() ?>">x</button>
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
        convertBtnToTextarea()
    });

// Get all delete buttons
    const deleteButtons = document.querySelectorAll('.delete-btn');

    // Add event listeners to each delete button
    deleteButtons.forEach(deleteBtn => {
        deleteBtn.addEventListener('click', (e) => {
            const cardId = deleteBtn.getAttribute('data-card-id');
            const deleteForm = document.querySelector(`[data-card-id="${cardId}"] + .delete-form`);

            // Toggle visibility of delete form
            deleteForm.style.display = deleteForm.style.display === 'none' ? 'flex' : 'none';
        });
    });

</script>




  
