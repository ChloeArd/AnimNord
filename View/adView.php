<?php
if (isset($_SESSION["id"])) {
?>
<main class="width_80">
    <h1 class="flexCenter title colorWhite"> Publication d'une annonce</h1>
    <div id="publish" class="backgroundWhite flexCenter flexColumn width_100">
        <p id="typeAd" class="width_100 center categoriesAnimal size20 colorWhite margin_15_0">Type d'annonce</p>
        <a href="../index.php?controller=adlost&action=new" class="containerType">
            <p><i class="fas fa-chevron-circle-right colorBlue"></i>J'ai perdu mon chien ou mon chat.</p>
        </a>
        <a href="../index.php?controller=adfind&action=new" class="containerType">
            <p><i class="fas fa-chevron-circle-right colorBlue"></i>J'ai trouvé un chien ou un chat.</p>
        </a>
        <p id="freeAd" class="colorGrey margin_15_0">La publication est totalement gratuite et instantanée !</p>
    </div>
    <div class="helpIndex flexCenter flexColumn colorWhite">
        <h2 class="title3">Comment publier une annonce ?</h2>
        <div class="margin_15_0">
            <p class="size18">C'est très simple, il vous suffit de :</p>
            <ul>
                <li>choisir parmis les 2 types d'annonces proposés,</li>
                <li>complêter le formulaire,</li>
                <li>cliquer sur "publier", et voilà <i class="far fa-laugh-wink"></i></li>
            </ul>
        </div>
    </div>
</main>
<?php
}