<?php
$title = "Anim'Nord : Publier une annonce";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

    <main class="width_80">
        <h1 class="flexCenter title colorWhite"> Publication d'une annonce</h1>
        <div id="publish" class="backgroundWhite flexCenter width_100">
            <form method="post" action="../assets/php/sendMail.php" class="flexColumn width_50">
               <div class="flexRow align">
                   <div class="circle flexCenter">
                       <span>1</span><p>
                   </div>
                   <p> Type d'annonce</p>
               </div>

            </form>
        </div>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";