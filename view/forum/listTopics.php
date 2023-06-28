<?php

$topics = $result["data"]['topics'];
    
?>
<div class="section-2">
    <div class="wrapper-list-topic">
    <h2>Destinations</h2>
    <a href="">
        <div class="cards">
        <?php
            foreach($topics as $topic ){
                echo "<div class='card'>
                    <h3>" . $topic->getTitle() . "</h3>
                    <p>" . $topic->getCreationdate() . "</p>
                    </div>";
            }
        ?>
        </div>
    </a>
    
    </div>
</div>




  
