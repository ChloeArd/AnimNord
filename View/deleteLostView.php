<?php
$id = $_GET['id'];
$manager = new \Model\AdLost\AdLostManager();
$adlost = $manager->getAd2($id);

foreach ($adlost as $ad) {
?>
    <main>
        <form id="delete" class="width_80 flexColumn flexCenter" method="post" action="">
            <h1 class="margin_15_0 colorRed">Voulez vous vraiment supprimer l'annonce "<?=$ad->getAnimal() ?> (<?=$ad->getSex() ?>)" ?</h1>
            <img src="<?=$ad->getPicture() ?>" alt="<?=$ad->getAnimal() ?>">
            <input type="hidden" name="user_fk" value="<?=$ad->getUserFk()->getId() ?>">
            <input type="hidden" name="id" value="<?=$ad->getId()?>">
            <input type="submit" class="buttonEnter colorWhite radius10 pointer backgroundRed" value="Supprimer l'annonce">
        </form>
    </main>

<?php
}