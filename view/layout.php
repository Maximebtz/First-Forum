<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>FORUM</title>
</head>
<body>
    <header>
        <button class="login-btn" href="#">Log In</button>
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
                    <a id="home" href="/exo-forum/First-Forum/">Home</a>
                </div>
                <div class="link">
                    <img src="./public/img/Globe.png" alt="globe icon">
                    <a id="destinations" href="#">Destinations</a>
                </div>
                <div class="link">
                    <img src="./public/img/Communication.png" alt="communication icon">
                    <a id="forum" href="index.php?ctrl=forum&action=listTopics">Forum</a>
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
        <div class="darkmode" >
            <div class="dark-mode-icon">
                <img class="moon-symbol" src="./public/img/Moon-Symbol.png" />
                <img class="sun" src="./public/img/sun.png" />
            </div>
            <div class="dark-mode-switch-bar">
                <div class="rectangle-7" >
                    <div class="ellipse-12" >
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <main id="">
                <?= $page ?>
        </main>
        <footer>

        </footer>
    </body>
    </html>