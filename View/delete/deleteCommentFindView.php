<?php
$id = $_GET['id'];
$manager = new \Model\CommentFind\CommentFindManager();
$commentFind = $manager->getCommentAd($id);

foreach ($commentFind as $comment) {
    $date = new DateTime($comment->getDate());?>
    <main>
        <h1 class="margin_15_0 colorRed center">Voulez-vous vraiment supprimer le commentaire ?</h1>
        <div class="commentArticle">
            <h3 class="margin_15_0"><?=$comment->getUserFk()->getFirstname() . " " . $comment->getUserFk()->getLastname() . " <span class='colorBlue size12'> - " . $date->format('d/m/Y') . "</span>"?></h3>
            <p><?=$comment->getContent() ?></p>
        </div>
        <form id="delete" class="width_80 flexColumn flexCenter" method="post" action="">
            <input type="hidden" name="id" value="<?=$comment->getId()?>">
            <input type="hidden" name="adFind_fk" value="<?=$comment->getAdFindFk()->getId() ?>">
            <input type="submit" class="buttonEnter colorWhite radius10 pointer backgroundRed" value="Supprimer">
        </form>
    </main>
    <?php
}