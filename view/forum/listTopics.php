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
                }
            ?>
                <div class="delete-form">
                    <form class="delete-action" action="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>" method="post">
                        <p>Êtes-vous sûr de vouloir supprimer ?</p>
                        <input class="conf-delete" type="submit" value="Supprimer">
                        <a href=""><input class="dont-delete" type="button" value="Non"></a>
                    </form>
                </div>
                <div class='card'>
                    <button class="delete-btn"><img src="./public/img/icons8-supprimer-64.png" alt="delete-icon"></button>
                    <button class="update-btn" data-card-id="<?= $category->getId() ?>"><img src="./public/img/icons8-modifier-20.png" alt="update-icon"></button>
                    <a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>">
                        <h3><?= $topic->getTitle() ?></h3>
                        <p><?= $topic->getCreationDate() ?></p>
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