<?php
$id = $_GET['id'];
$manager = new \Model\CommentFind\CommentFindManager();
$commentFind = $manager->getCommentAd($id);
foreach ($commentFind as $comment) {
    ?>
    <main>
        <h2 class="title colorWhite flexCenter width_80">Modifier un commentaire</h2>
        <form class="width_80 margin100 flexColumn" action="" method="post">
            <label for="comment" class="form-label">Commentaire <span class="colorBlue size12">*</span></label>
            <textarea id="comment" class="form-control" name="content" required><?=$comment->getContent() ?></textarea>
            <input type="hidden" name="id" id="id" value="<?=$comment->getId()?>" >
            <input type="submit" id="submit" class="buttonEnter colorWhite" value="Ajouter le commentaire">
        </form>
    </main>
    <?php
}