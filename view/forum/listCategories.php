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
        <div class="cards" id="cards">
            <h2>Destinations</h2>
            
            <?php
                foreach ($categories as $category) {
            ?>
                <div class="delete-form">
                    <form class="delete-action" action="index.php?ctrl=forum&action=deleteCategory&id=<?= $category->getId() ?>" method="post">
                        <p>Êtes-vous sûr de vouloir supprimer ?</p>
                        <input class="conf-delete" type="submit" value="Supprimer">
                        <a href=""><input class="dont-delete" type="button" value="Non"></a>
                    </form>
                </div>
                <div class='card'>
                    <button class="delete-btn" data-card-id="<?= $category->getId() ?>">x</button>
                    <a href="index.php?ctrl=forum&action=listTopics&id=<?= $category->getId() ?>">
                        <h3><?= $category->getName() ?> :</h3>
                        <p><?= $category->getDescription() ?></p>
                    </a>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<script>

    /********** cardEffect ********/ 

    document.getElementById("cards").onmousemove = e => {
        for (const card of document.getElementsByClassName("card")) {
            const rect = card.getBoundingClientRect(),
            x = e.clientX - rect.left,
            y = e.clientY - rect.top;
            
            card.style.setProperty("--mouse-x", `${x}px`);
            card.style.setProperty("--mouse-y", `${y}px`);
        }
    }
    

    /********** addForm ********/ 

    const newMsgBtn = document.querySelector('.new-msg-btn');
    const newMsgTextarea = document.querySelector('.btn-convert-msg');

    function convertBtnToTextarea() {
        newMsgBtn.style.display = 'none';
        newMsgTextarea.style.display = 'flex';
    }

    newMsgBtn.addEventListener('click', function() {
        convertBtnToTextarea();
    });


    /********** deleteForm ********/ 

    const deleteBtns = document.querySelectorAll('.delete-btn');
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteBtns.forEach(function(deleteBtn, index) {
        deleteBtn.addEventListener('click', function() {
            const deleteForm = deleteForms[index];
            const card = deleteBtn.closest('.card');
            showDeleteForm(deleteForm, card);
        });
    });

    function showDeleteForm(deleteForm, card) {
        deleteForm.style.display = 'flex';
    }

    console.log(deleteBtns);

</script>
