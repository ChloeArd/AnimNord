<?php
$id = $_GET['id'];
$manager = new \Model\User\UserManager();
$user = $manager->getUserID($id);

if ($_GET['id'] === $_SESSION['id']) {
    foreach ($user as $info) { ?>
        <main class="flexCenter flexColumn">
            <h1 class="margin_15_0 colorRed center">Voulez-vous vraiment supprimer votre compte ?</h1>
            <form id="delete" class="width_80 flexColumn flexCenter" method="post" action="">
                <p class="size20 colorBlue"><?=$info->getFirstname() . " " . $info->getLastname() ?></p>
                <input type="hidden" name="id" value="<?=$info->getId()?>">
                <input type="submit" class="buttonEnter colorWhite radius10 pointer backgroundRed" value="Supprimer">
            </form>
        </main>
    <?php
    }
}