<?php



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
    <title>Forum</title>
</head>
<body>
    <header>

    <?php
        if(isset($_SESSION['user'])){ 
    ?>  
        
        <a class="logout" href="index.php?ctrl=security&action=logOut"><button><img src="./public/img/icons8-sortie-50.png" alt=""></button></a>
       
        <figure class="img-user-header">
            <img src="./public/img/<?= $_SESSION['user']->getImage() ?>" alt=""><span class="online-span"></span></img>
        </figure>
    <?php 
        } else { 
    ?>
        <a href="index.php?ctrl=security&action=displaySignUp"><button class="signup-btn" href="">Sign Up</button></a>
        <a href="index.php?ctrl=security&action=displayLogIn"><button class="login-btn">Log In</button></a>
    <?php 
        } 
    ?>

    </header>
    <nav>
        <div class="upper-nav-content">
            <div class="title">
                <img src="./public/img/Expedition Backpack.png" alt="backpacker icon">
                <h1>TBF·Travel</h1>
            </div>
            <div class="links">
                <div class="link">
                    <img src="./public/img/Home.png" alt="home icon">
                    <a id="home" href="index.php">Home</a>
                </div>
                <div class="link">
                    <img src="./public/img/Globe.png" alt="globe icon">
                    <a id="destinations" href="#">Destinations</a>
                </div>
                <div class="link">
                    <img src="./public/img/Communication.png" alt="communication icon">
                    <a id="forum" href="index.php?ctrl=forum&action=listCategories">Forum</a>
                </div>
                <div class="link">
                    <img src="./public/img/Brainstorm Skill.png" alt="inspiration icon">
                    <a id="inspiration" href="#">Inspirations</a>
                </div>
                <div class="link">
                    <img src="./public/img/Crystal Ball.png" alt="tips icon">
                    <a id="tips" href="#">Tips</a>
                </div>
            </div>
            <div class="contacts">
                <h3>Contacts</h3>
            </div>
        </div>
        <div class="light-mode" >
            <div class="light-mode-icon">
                <img class="moon-symbol" src="./public/img/Moon-Symbol.png" />
                <img class="sun" src="./public/img/sun.png" />
            </div>
            <div class="light-mode-switch-bar">
                <input type="checkbox" hidden="hidden" id="light-mode">
                <label class="switch" for="light-mode"></label>
            </div>
        </div>
    </nav>
    <main id="">
        <?= $page ?>
    </main>
    <footer>
        <div class="links">
            <h4>
                TBF·Travel
            </h4>
            <p>
                World traveler community
            </p>
            <figure>
                <img src="./public/img/Instagram.png" alt="" class="social-media">
                <img src="./public/img/Facebook.png" alt="" class="social-media">
                <img src="./public/img/Twitter.png" alt="" class="social-media">        
            </figure>
        </div>
        <div class="footer-lists">
            <div class="footer-list">
                <h5>
                    TBF
                </h5>
                <a href="" class="a-tbf">Qui sommes-nous ?</a>
                <a href="" class="a-tbf">Ecrivez-nous</a>
                <a href="" class="a-tbf">Road-Trips</a>
                <a href="" class="a-tbf">Trouver un compagnon de voyage</a>
            </div>
            <div class="footer-list">
                <h5>
                    Guide
                </h5>
                <a href="" class="a-guide">F.A.Q.</a>
                <a href="" class="a-guide">L'histoire du voyage</a>
            </div>
            <div class="footer-list">
                <h5>
                    Services
                </h5>
                <a href="" class="a-services">Newsletter</a>
                <a href="" class="a-services">Playlist</a>
                <a href="" class="a-services">Trouver un hôtel</a>
                <a href="" class="a-services">Trouver un avion</a>
                <a href="" class="a-services">Trouver un train</a>
                <a href="" class="a-services">Trouver une voiture</a>
            </div>
        </div>
    </footer>
    <script>


        /********** deleteForm ********/    

        const themeBtn = document.getElementById('light-mode');
        const body = document.body;
    
        // Vérifier l'état actuel du mode et le restaurer lors du chargement de la page
        if (localStorage.getItem('lightMode') === 'true') {
            body.classList.add('light-mode');
            themeBtn.checked = true;
        }
    
        // Écouter l'événement de clic sur le bouton du mode lumière
        themeBtn.addEventListener('click', () => {
            if (body.classList.contains('light-mode')) {
                body.classList.remove('light-mode');
                localStorage.setItem('lightMode', 'false');
            } else {
                body.classList.add('light-mode');
                localStorage.setItem('lightMode', 'true');
            }
        });
    </script>
</body>
</html>