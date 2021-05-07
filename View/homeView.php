<?php
$return = "";
$id = "";

if (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Vous êtes bien déconnecté(e) !";
            break;
    }
}

$manager = new \Model\AdLost\AdLostManager();
$adLost = $manager->recentAdLost();
?>

    <div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
    <main class=" width_100 flexColumn">
        <div class="flexCenter flexColumn">
            <img class="backgroundPet" src="https://fac.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Ffac.2F2020.2F10.2F21.2F0519a0ca-89c8-4d0c-97cf-30b4672f5956.2Ejpeg/850x478/quality/90/crop-from/center/pet-parents-le-match-chien-chat.jpeg" alt="chien et chat">
            <p class="question buttonWhite colorBlue">Vous avez perdus, trouvés ou vous voulez adopter près de chez vous ? Vous êtes tombés sur le bon site de chiens et de
                chats du Nord (59).</p>
        </div>

        <div class="helpIndex colorWhite">
            <p>Chaque année en France, <strong>80 000  chiens et chats sont perdus !</strong> Dû par les départs en vacances.
                Qui peuvent les perturber, les éffrayer et les ammener à s'enfuir.</p>
            <p>Dans le Nord en 2018, il y a eu d'avantages de chiens déclarés perdus que de chats.</p>
            <div id="catDogLost" class="flexCenter flexRow">
                <p class="numberLost buttonWhite colorBlue margin8 size18">Chats : 23 937 perdus</p>
                <p class="numberLost buttonWhite colorBlue margin8 size18">Chiens : 28 121 perdus</p>
            </div>
            <p>Par ce fait, <strong>52 000 </strong> animaux ont dû passer par les fourrières de la France en 2019. En moyenne, près de <strong>4 000</strong> chiens et
                <strong>420 </strong>chats sont déclarés entrés en fourrière par mois. C’est beaucoup trop !</p>
            <p>Du fait, leurs maîtres se retrouvent alors confrontés à l’angoisse de ne jamais revoir leur animal de compagnie.
                Alors, qu'il reste toujours de l'espoire, c'est pour celà que nous sommes là, Anim'Nord vous permet de publier une
                annonce facilement, rapidement et gratuitement, pour retrouver au plus vite votre compagnon préféré. </p>

            <p>Malgré tous, il y a une hausse des animaux retrouvées est constatés ! Une très bonne nouvelle ! En 2019, ce sont <strong>33 317</strong>
                animaux qui ont été déclarés retrouvés par leurs propriétaires. Mais aussi grâce aux fourrières, aux associations et grâce à vous, ils ont pu retrouvés leurs nid douillés.</p>
        </div>

        <div id="#recentPost">
            <h2 class="center title2">Annonces récentes de chiens et de chats perdus</h2>
            <div class="width_80 flexRow flexCenter flexWrap">
                <?php
                foreach ($adLost as $ad) {
                    $date = new DateTime($ad->getDateLost())?>
                    <a href='#' class='containerRecentPost flexColumn flexCenter radius10'>
                        <img class='imagePet' src='<?=$ad->getPicture() ?>'>
                        <p class='margin8'><?=$ad->getRace() ?></p>
                        <p class='margin8'><i class="fas fa-calendar-day"></i><?=$date->format('d/m/Y') ?></p>
                        <p class='location'><i class='fas fa-search-location'></i><?=$ad->getCity() ?></p>
                    </a>
                    <?php
                }
                ?>
            </div>
            <a href="../index.php?controller=adlost" class="buttonEnter buttonCenter radius10 align flexCenter">Allez sur les annonces <i class="fas fa-hand-point-right"></i></a>

            <div class="separatorHorizontal"></div>
            <h2 class="center title2">Annonces récentes de chiens et de chats trouvés</h2>
            <div class="width_80 flexRow flexCenter flexWrap">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    $id = $i + 10;
                    echo "
                <a href='#' class='containerRecentPost flexColumn flexCenter radius10'>
                        <img class='imagePet' src='https://placedog.net/500/280?id=". $id ."' >
                <p class='margin8'>Race de l'animal</p>
                <p class='margin8'>Date d'apparition</p>
                <p class='location'><i class='fas fa-search-location'></i>Lieu trouvé</p>
            </a>
                ";
                }
                ?>
            </div>
            <a href="pages/find.php" class="buttonEnter buttonCenter radius10 align flexCenter">Allez sur les annonces <i class="fas fa-hand-point-right"></i></a>

            <div class="separatorHorizontal"></div>
            <h2 class="center title2">Annonces récentes de chiens et de chats à adopter</h2>
            <div class="width_80 flexRow flexCenter flexWrap">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    $id = $i + 6;
                    echo "
                <a href='#' class='containerRecentPost flexColumn flexCenter radius10'>
                        <img class='imagePet' src='https://placedog.net/500/280?id=". $id ."' >
                <p class='margin8'>Race de l'animal</p>
                <p class='margin8'>Âge</p>
                <p class='location'><i class='fas fa-map-marker-alt'></i>Lieu</p>
            </a>
                ";
                }
                ?>
            </div>
            <a href="pages/adopt.php" class="buttonEnter buttonCenter radius10 align flexCenter">Allez sur les annonces <i class="fas fa-hand-point-right"></i></a>
            <div class="accountIndex">
                <?php
                if (isset($_SESSION["id"])) {
                    ?>
                    <h2 class="title3 center">Vous avez perdus votre animal ? trouvés un animal ? Ou vous voulez faire adopter un animal ?</h2>
                    <div id="connection_disconnection" class="flexRow flexCenter">
                        <a href="pages/ad.php" class="buttonWhite2">Publier une annonce</a>
                    </div>
                    <?php
                }
                else {
                    ?>
                    <h2 class="title3 center">Pas encore incrit ? ou pas encore connecté ?</h2>
                    <div id="connection_disconnection" class="flexRow flexCenter">
                        <a href="pages/registration.php" class="buttonWhite2">Inscription</a>
                        <a href="pages/connect.php" class="buttonWhite2">Connexion</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </main>