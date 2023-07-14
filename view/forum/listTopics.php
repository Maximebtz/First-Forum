<?php

$topics = $result["data"]['topics'];
$category = null;

?>
<div class="section-2">
    <div class="wrapper-list">
    
        <?php
            if($topics){
            foreach($topics as $topic){
                if ($category === null) {
                    $category = $topic->getCategory();
                    echo "<div class='description'>
                            <h1>" . $category->getName() . " </h1>
                            <article>" . $category->getDescription() . "</article>
                            "; 
                            
                    if(isset($_SESSION['user'])){ 
                        
                        echo "
                            <input type='button' class='new-msg-btn' value='Nouveau Topic'></input>"; 

                    } 
                    
                    echo "
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
                }

            ?>
                <div class='card'>
                <?php if(isset($_SESSION['user'])){?>
                    <button class="delete-btn"><img src="./public/img/icons8-supprimer-64.png" alt="delete-icon"></button>
                    <button class="update-btn"><img src="./public/img/icons8-modifier-20.png" alt="update-icon"></button>
                <?php } ?>
                    <a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>">
                        <h3><?= $topic->getTitle() ?></h3>
                        <p><?= $topic->getCreationDate() ?></p>
                    </a>
                    <form class="delete-action" action="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>" method="post">
                        <button type="submit" class="delete-btn"><img src="./public/img/icons8-supprimer-64.png" alt="delete-confirmation-icon"></button>
                        <a href="index.php?ctrl=forum&action=listTopics"><button type="button" class="close-btn"><img src="./public/img/icons8-multiplier-20.png" alt="annulation-icon"></a>
                    </form>
                </div>
                <div class='card update-form'>
                    <form class="update-action" action="index.php?ctrl=forum&action=listTopics" method="post">
                        <input class="update-title" type="text" value="<?= $topic->getTitle() ?> :">
                        <textarea class="update-description" name="description" id="description"><?= $topic->getDescription() ?></textarea>
                        <button type="submit" class="validation-btn" data-card-id="<?= $topic->getId() ?>"><img src="./public/img/icons8-coche-20.png" alt="update-validation-icon"></button>
                        <a href="index.php?ctrl=forum&action=listTopics"><button class="update-btn" data-card-id="<?= $topic->getId() ?>"><img src="./public/img/icons8-multiplier-20.png" alt="annulation-icon"></button></a>
                    </form>
                </div>
            <?php }
                } else {
                echo "
                <input type='button' class='new-msg-btn' value='Nouveau Topic'></input>
                <form action='index.php?ctrl=forum&action=addTopic&id=" . $category->getId() . "' method='post' class='btn-convert-msg'>
                    <label for='title-topic'>Titre :</label>
                    <input class='new-title-topic' type='text' name='title' id='title-topic'>
                    <label for='description-topic'>Description :</label>
                    <textarea class='new-msg-text hidden' name='description' id='description-topic' placeholder='Décrire le nouveau sujet...'></textarea>
                    <label for='post-topic'>Message :</label>
                    <textarea class='new-msg-text hidden' name='text' id='post-topic' placeholder='Ecrire le premier message ici...'></textarea>
                    <button type='submit' name='addTopic' class='msg-sub-btn'><img src='./public/img/icons8-envoyé-24.png' alt=''></button>
                </form>
                <p>Il n'y a pas encore de topic pour cette catégorie</p>
                    ";
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

    
    /********** updateForm ********/ 

    const updateBtns = document.querySelectorAll('.update-btn');
    const updateForms = document.querySelectorAll('.update-form');

    updateBtns.forEach(function(updateBtn, index) {
        updateBtn.addEventListener('click', function() {
            const updateForm = updateForms[index];
            const card = updateBtn.closest('.card');
            showupdateForm(updateForm, card);
        });
    });

    function showupdateForm(updateForm, card) {
        updateForm.style.display = 'block';
    }
</script>