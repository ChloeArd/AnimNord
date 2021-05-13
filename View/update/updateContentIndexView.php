<?php
$manager = new \Modele\ContentIndex\ContentIndexManager();
$content = $manager->getContent($_GET['id']);

foreach ($content as $value) { ?>
    <main>
        <h1 class="title colorWhite flexCenter width_80">Changer le contenu de la page d'Accueil</h1>
        <div class="containerAccount">
            <form action="" method="post" class="flexColumn">
                <label for="picture" class="colorBlack size20">Image <span class="size15 required colorBlue">*</span></label>
                <input type="url" name="picture" id="picture" class="backgroundWhite" pattern=".*\S.*" value="<?=$value->getPicture() ?>" required>
                <label for="text1" class="colorBlack size20">Texte d'accueil <span class="size15 required colorBlue">*</span></label>
                <textarea name="text1" id="text1" class="backgroundWhite" required><?=$value->getText1() ?></textarea>
                <label for="text2" class="colorBlack size20">Texte de sensibilisation <span class="size15 required colorBlue">*</span></label>
                <textarea name="text2" id="text2" class="backgroundWhite" required><?=$value->getText2() ?></textarea>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <input type="hidden" name="user_fk" value="<?=$value->getUserFk()->getId()?>">
                <div class="flexCenter">
                    <input type="submit" class="buttonEnter colorWhite" value="Changer">
                </div>
            </form>
        </div>
    </main>
<?php
}