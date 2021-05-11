<?php
$id = $_GET['id'];
$manager = new \Model\User\UserManager();
$user = $manager->getUser($id);
foreach ($user as $info) {
?>
    <main>
        <h1 class="margin_15_0 colorRed center">Voulez-vous vraiment supprimer votre compte ?</h1>
        <form id="delete" class="width_80 flexColumn flexCenter" method="post" action="">
            <input type="hidden" name="id" value="<?=$info->getId()?>">
            <input type="submit" class="buttonEnter colorWhite radius10 pointer backgroundRed" value="Supprimer le commentaire">
        </form>
    </main>
<?php
}