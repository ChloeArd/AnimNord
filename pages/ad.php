<?php
$title = "Anim'Nord : Publier une annonce";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

    <main class="width_80">
        <h1 class="flexCenter title colorWhite"> Publication d'une annonce</h1>
        <div id="publish" class="backgroundWhite flexCenter flexColumn width_100">
           <div class="flexRow align">
               <div class="circle flexCenter">
                   <span>1</span>
               </div>
               <p> Type d'annonce</p>
           </div>
            <a href="lostAd.php" class="containerType">
                <p><i class="fas fa-chevron-circle-right"></i>J'ai perdu mon chien ou mon chat.</p>
            </a>
            <a href="findAd.php" class="containerType">
                <p><i class="fas fa-chevron-circle-right"></i>J'ai trouvé un chien ou un chat.</p>
            </a>
            <a href="adoptAd.php" class="containerType">
                <p><i class="fas fa-chevron-circle-right"></i>J'ai un chien ou un chat à faire adopter.</p>
            </a>

        </div>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";