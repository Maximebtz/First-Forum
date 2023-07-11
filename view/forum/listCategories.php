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
            <textarea class="new-msg-text hidden" name="description" id="description-category" placeholder="Ecrire ici..."></textarea>
            <button type="submit" name="addCategory" class="msg-sub-btn"  ><img src="./public/img/icons8-envoyé-24.png" alt=""></button>
        </form>
        <div class="cards" id="cards">
            <h2>Destinations</h2>
            <?php
                foreach ($categories as $category) {
            ?>
                
                <div class='card'>
                    <button class="delete-btn"><img src="./public/img/icons8-supprimer-64.png" alt="delete-icon"></button>
                    <button class="update-btn"><img src="./public/img/icons8-modifier-20.png" alt="update-icon"></button>
                    <a href="index.php?ctrl=forum&action=listTopics&id=<?= $category->getId() ?>">
                        <h3><?= $category->getName() ?> :</h3>
                        <p><?= $category->getDescription() ?></p>
                    </a>
                    <form class="delete-action" action="index.php?ctrl=forum&action=deleteCategory&id=<?= $category->getId() ?>" method="post">
                        <button type="submit" class="delete-btn"><img src="./public/img/icons8-supprimer-64.png" alt="delete-confirmation-icon"></button>
                        <a href="index.php?ctrl=forum&action=listCategories"><button type="button" class="close-btn"><img src="./public/img/icons8-multiplier-20.png" alt="annulation-icon"></button></a>
                    </form>
                </div>
                <div class='card update-form'>
                    <form class="update-action" action="index.php?ctrl=forum&action=updateCategory&id=<?= $category->getId() ?>" method="post">
                        <input class="update-title" type="text" name="name" value="<?= $category->getName() ?> :">
                        <textarea class="update-description" name="description" id="description"><?= $category->getDescription() ?></textarea>
                        <button type="submit" class="validation-btn"><img src="./public/img/icons8-coche-20.png" alt="update-validation-icon"></button>
                        <button class="close-btn"><img src="./public/img/icons8-multiplier-20.png" alt="annulation-icon"></button>
                    </form>
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
    const deleteForms = document.querySelectorAll('.delete-action');

    deleteBtns.forEach(function(deleteBtn) {
        deleteBtn.addEventListener('click', function() {
            const card = deleteBtn.closest('.card');
            const deleteForm = card.querySelector('.delete-action');
            showDeleteForm(deleteForm, card);
        });
    });

    function showDeleteForm(deleteForm, card) {
        deleteForm.style.display = 'flex';
    }


    /********** updateForm ********/ 

    const updateBtns = document.querySelectorAll('.update-btn');
    const updateForms = document.querySelectorAll('.update-form');

    updateBtns.forEach(function(updateBtn, index) {
        updateBtn.addEventListener('click', function() {
            const updateForm = updateForms[index];
            const card = updateBtn.closest('.card');
            card.style.display = 'none';
            showupdateForm(updateForm, card);
        });
    });

    function showupdateForm(updateForm, card) {
        // const card = document.querySelector('.card');
        updateForm.style.display = 'block';
        // card.style.display = 'none';
    }


</script>
