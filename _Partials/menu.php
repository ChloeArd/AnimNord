<header>
    <div class="flexCenter">
        <img class="logoAnim" src="../assets/img/banniereAnimNord.png">
    </div>
    <div id="menu" class="menu flexCenter flexRow">
        <p><i class="fas fa-paw"></i></p>
        <a class="linkMenu" href="../index.php">Accueil</a>
        <a class="linkMenu" href="../pages/lost.php">Perdus</a>
        <a class="linkMenu" href="../pages/find.php">Trouvés</a>
        <a class="linkMenu" href="../pages/adopt.php">(Adoptés)</a>
        <?php
        if (isset($_SESSION["id"])) {
            ?>
            <a class="linkMenu" href="../pages/ad.php">Publier une annonce</a>
            <a class="linkMenu" id="pseudo" href="../pages/informationAccount.php"><i class="fas fa-user-circle"></i><?= $_SESSION["firstname"]?></a>
            <?php
        }
        else {
            ?>
            <a class="linkMenu" href="../pages/connect.php">Connexion</a>
            <a class="linkMenu" href="../pages/registration.php">Inscription </a>
            <?php
        }
        ?>

        <p><i class="fas fa-paw"></i></p>
    </div>

    <div id="menuMobile" class="flexRow align">
        <p id="logoMenu"><i class="fas fa-bars"></i></p>
        <img class="logoAnim2" src="../assets/img/logo-animNord.png">
    </div>

    <div id="subMenu" class="flexColumn">
        <a class="linkMenuMobile flexRow align" href="../index.php"><i class="fas fa-chevron-circle-right"></i>Acceuil</a>
        <a class="linkMenuMobile flexRow align" href="../pages/lost.php"><i class="fas fa-chevron-circle-right"></i>Perdus</a>
        <a class="linkMenuMobile flexRow align" href="../pages/find.php"><i class="fas fa-chevron-circle-right"></i>Trouvés</a>
        <a class="linkMenuMobile flexRow align" href="../pages/adopt.php"><i class="fas fa-chevron-circle-right"></i>(Adoptés)</a>
        <?php
        if (isset($_SESSION["id"])) {
            ?>
            <a class="linkMenuMobile flexRow align" href="../pages/ad.php"><i class="fas fa-chevron-circle-right"></i>Publier une annonce</a>
            <a class="linkMenuMobile flexRow align" href="../pages/informationAccount.php"><i class="fas fa-chevron-circle-right"></i><i class="fas fa-user-circle"></i><?= $_SESSION["firstname"]?></a>
            <?php
        }
        else {
            ?>
            <a class="linkMenuMobile flexRow align" href="../pages/connect.php"><i class="fas fa-chevron-circle-right"></i>Connexion</a>
            <a class="linkMenuMobile flexRow align" href="../pages/registration.php"><i class="fas fa-chevron-circle-right"></i>Inscription</a>
            <?php
        }
        ?>

    </div>

</header>