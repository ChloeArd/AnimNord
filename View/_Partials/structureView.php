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

    <header>
        <div class="flexCenter">
            <img class="logoAnim" src="../../assets/img/banniereAnimNord.png">
        </div>
        <div id="menu" class="menu flexCenter flexRow">
            <p><i class="fas fa-paw"></i></p>
            <a class="linkMenu" href="../../index.php">Accueil</a>
            <a class="linkMenu" href="../../index.php?controller=adlost">Perdus</a>
            <a class="linkMenu" href="../../index.php?controller=adfind">Trouvés</a>
            <a class="linkMenu" href="../adopt.php">(Adoptés)</a>
            <?php
            if (isset($_SESSION["id"])) {
                ?>
                <a class="linkMenu" href="../../View/ad.php">Publier une annonce</a>
                <a class="linkMenu" id="pseudo" href="../../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>"><i class="fas fa-user-circle"></i><?= $_SESSION["firstname"]?></a>
                <?php
            }
            else {
                ?>
                <a class="linkMenu" href="../../View/connect.php">Connexion</a>
                <a class="linkMenu" href="../../View/registration.php">Inscription </a>
                <?php
            }
            ?>

            <p><i class="fas fa-paw"></i></p>
        </div>

        <div id="menuMobile" class="flexRow align">
            <p id="logoMenu"><i class="fas fa-bars"></i></p>
            <img class="logoAnim2" src="/assets/img/logo-animNord.png">
        </div>

        <div id="subMenu" class="flexColumn">
            <a class="linkMenuMobile flexRow align" href="../../index.php"><i class="fas fa-chevron-circle-right"></i>Acceuil</a>
            <a class="linkMenuMobile flexRow align" href="../../index.php?controller=adlost"><i class="fas fa-chevron-circle-right"></i>Perdus</a>
            <a class="linkMenuMobile flexRow align" href="../../index.php?controller=adfind"><i class="fas fa-chevron-circle-right"></i>Trouvés</a>
            <a class="linkMenuMobile flexRow align" href="../adopt.php"><i class="fas fa-chevron-circle-right"></i>(Adoptés)</a>
            <?php
            if (isset($_SESSION["id"])) {
                ?>
                <a class="linkMenuMobile flexRow align" href="../../View/ad.php"><i class="fas fa-chevron-circle-right"></i>Publier une annonce</a>
                <a class="linkMenuMobile flexRow align" href="../../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>"><i class="fas fa-chevron-circle-right"></i><i class="fas fa-user-circle"></i><?= $_SESSION["firstname"]?></a>
                <?php
            }
            else {
                ?>
                <a class="linkMenuMobile flexRow align" href="../connect.php"><i class="fas fa-chevron-circle-right"></i>Connexion</a>
                <a class="linkMenuMobile flexRow align" href="../registration.php"><i class="fas fa-chevron-circle-right"></i>Inscription</a>
                <?php
            }
            ?>

        </div>

    </header>

    <?= $html ?>

    <footer class="flexCenter flexColumn">
        <img id="logosite" src="/assets/img/chien_chat_bleu.png">
        <p class="colorWhite size18">Suivez-nous :</p>
        <div class="flexRow">
            <a href="#"><i class="fab fa-facebook-square linkSocial"></i></a>
            <a href="#"><i class="fab fa-twitter-square linkSocial"></i></a>
            <a href="#"><i class="fab fa-instagram-square linkSocial"></i></a>
        </div>
        <div class="separatorHorizontal2"></div>
        <div id="containerlinkFooter" class="flexRow">
            <a href="#" class="linkFooter underline">Mention légales</a>
            <a href="../contact.php" class="linkFooter underline">Contact</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>
