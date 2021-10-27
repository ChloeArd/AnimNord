<?php
$id = $_GET['id'];
date_default_timezone_set("Europe/Paris");
?>
<main>
    <h2 class="title colorWhite flexCenter width_80">Poster un commentaire</h2>
    <form class="width_80 margin100 flexColumn" action="" method="post">
        <label for="comment" class="form-label">Commentaire *</label>
        <textarea id="comment" class="form-control" name="content" required></textarea>
        <input name="date"  type="hidden" id="date" value="<?= date('Y-m-d')?>">
        <input name="user_fk"  type="hidden" id="user_fk" value="<?= $_SESSION['id']?>">
        <input name="adFind_fk" type="hidden" id="adFind_fk" value="<?= $id ?>">
        <input type="submit" id="submit" class="buttonEnter colorWhite" value="Ajouter le commentaire">
    </form>
</main>