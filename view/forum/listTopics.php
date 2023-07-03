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
                                <button>Créer un nouveau sujet</button>
                                </div>
                            <div class='cards' id='cards'>";
                    }
                    ?>
            <a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>">
                <div class='card'>
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
