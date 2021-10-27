<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link id="logoPage" rel="icon" type="image/png" href="/assets/img/chien_chat_bleu.png">
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div id="wrap">
    <header>
        <div class="flexCenter">
            <img class="logoAnim" src="../../assets/img/banniereAnimNord.png" alt="Logo Anim'Nord">
        </div>
        <div id="menu" class="menu flexCenter flexRow">
            <p><i class="fas fa-paw"></i></p>
            <a class="linkMenu" href="../../index.php">Accueil</a>
            <a class="linkMenu" href="../../index.php?controller=adlost">Perdus</a>
            <a class="linkMenu" href="../../index.php?controller=adfind">Trouvés</a>
            <?php
            if (isset($_SESSION["id"])) {
                ?>
                <a class="linkMenu" href="../../index.php?controller=ad">Publier une annonce</a>
                <a class="linkMenu" id="pseudo" href="../../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>"><i class="fas fa-user-circle"></i><?= $_SESSION["firstname"]?></a>
                <?php
            }
            else {
                ?>
                <a class="linkMenu" href="../../index.php?controller=connection">Connexion</a>
                <a class="linkMenu" href="../../index.php?controller=registration">Inscription </a>
                <?php
            }
            ?>
            <p><i class="fas fa-paw"></i></p>
        </div>

        <div id="menuMobile" class="flexRow align">
            <p id="logoMenu"><i class="fas fa-bars"></i></p>
            <img class="logoAnim2" src="/assets/img/logo-animNord.png" alt="Logo Anim'Nord">
        </div>

        <div id="subMenu" class="flexColumn">
            <a class="linkMenuMobile flexRow align" href="../../index.php"><i class="fas fa-chevron-circle-right"></i>Accueil</a>
            <a class="linkMenuMobile flexRow align" href="../../index.php?controller=adlost"><i class="fas fa-chevron-circle-right"></i>Perdus</a>
            <a class="linkMenuMobile flexRow align" href="../../index.php?controller=adfind"><i class="fas fa-chevron-circle-right"></i>Trouvés</a>
            <?php
            if (isset($_SESSION["id"])) {
                ?>
                <a class="linkMenuMobile flexRow align" href="../../index.php?controller=ad"><i class="fas fa-chevron-circle-right"></i>Publier une annonce</a>
                <a class="linkMenuMobile flexRow align" href="../../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>"><i class="fas fa-chevron-circle-right"></i><i class="fas fa-user-circle"></i><?= $_SESSION["firstname"]?></a>
                <?php
            }
            else {
                ?>
                <a class="linkMenuMobile flexRow align" href="../../index.php?controller=connection"><i class="fas fa-chevron-circle-right"></i>Connexion</a>
                <a class="linkMenuMobile flexRow align" href="../../index.php?controller=registration"><i class="fas fa-chevron-circle-right"></i>Inscription</a>
                <?php
            }
            ?>
        </div>
    </header>

    <?= $html ?>

    <footer class="flexCenter flexColumn">
        <img id="logosite" src="/assets/img/chien_chat_bleu.png" alt="Logo Anim'Nord">
        <p class="colorWhite size18">Suivez-nous :</p>
        <div class="flexRow">
            <a href="#"><i class="fab fa-facebook-square linkSocial"></i></a>
            <a href="#"><i class="fab fa-twitter-square linkSocial"></i></a>
            <a href="#"><i class="fab fa-instagram-square linkSocial"></i></a>
        </div>
        <div class="separatorHorizontal2"></div>
        <div id="containerlinkFooter" class="flexRow">
            <a href="../../index.php?controller=legalNotice" class="linkFooter underline">Mentions légales</a>
            <a href="../../index.php?controller=contact" class="linkFooter underline">Contact</a>
        </div>
    </footer>
</div>
<script src="/assets/js/app.js"></script>
</body>
</html>
