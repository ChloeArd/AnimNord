<?php
$title = "Anim'Nord : Publier une annonce";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

    <main class="width_80">
        <h1 class="flexCenter title colorWhite">Publication d'une annonce pour chien ou chat à adopter</h1>
        <p class="width_100 center categoriesAnimal colorWhite margin_15_0">1. Connecte toi !</p>
        <form method="post" action="../assets/php/sendMail.php" class="flexColumn width_50">
            <div class="flexRow align flexCenter">
                <div class="circle flexCenter">
                    <span>2</span>
                </div>
                <p>Informations sur l'animal</p>
            </div>
            <div class="flexRow align">
                <label for="animal" class="marginR">Animal : </label>
                <input type="radio" name="animal" value="chien" required>
                <span class="margin_0_20"><i class="fas fa-dog"></i></span>
                <input type="radio" name="animal" value="chat" required>
                <span class="margin_0_20"><i class="fas fa-cat"></i></span>
            </div>
            <label for="name">Son nom :</label>
            <input type="text" id="name" name="name" required>
            <label for="sexe"> Sexe :</label>
            <div class="categoriePet">
                <div class="flexRow align">
                    <input type="radio" name="sexe" value="mâle" required>
                    <span class="margin_0_20">Mâle</span>
                </div>
                <div class="flexRow align">
                    <input type="radio" name="sexe" value="femelle" required>
                    <span class="margin_0_20">Femelle</span>
                </div>
                <div class="flexRow align">
                    <input type="radio" name="sexe" value="inconnu" required>
                    <span class="margin_0_20">Inconnu</span>
                </div>
            </div>
            <label for="size"> Taille :</label>
            <select name="size" class="size15 categoriePet">
                <option>Très petite</option>
                <option>Petite</option>
                <option>Moyenne</option>
                <option>Grande</option>
                <option>Très grande</option>
            </select>
            <label for="fur"> Poils :</label>
            <select name="fur" class="size15 categoriePet">
                <option>Nue</option>
                <option>Court</option>
                <option>Mi-long</option>
                <option>Long</option>
            </select>
            <label for="colors"> Couleur du pelage :</label>
            <div class="categoriePet">
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Noir">
                    <span class="margin_0_20 borderBlack black"></span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Blanc">
                    <span class="margin_0_20 borderBlack"></span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Marron">
                    <span class="margin_0_20 borderBlack brown"></span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Gris">
                    <span class="margin_0_20 borderBlack grey"></span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Beige">
                    <span class="margin_0_20 borderBlack beige"></span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Roux">
                    <span class="margin_0_20 borderBlack orange"></span>
                </div>
            </div>
            <label for="colors">Robe :</label>
            <select name="colors" class="size15 categoriePet">
                <option>Uni</option>
                <option>Tacheté</option>
                <option>Rayé</option>
                <option>Bringé</option>
                <option>Bicolor</option>
                <option>Tricolore</option>
            </select>
            <label for="race">Race :</label>
            <input type="text" name="race" id="race" placeholder="ex : berger allemand" class="categoriePet" required>
            <label for="num">Numéro du tatouage ou de la puce :</label>
            <input type="number" name="num" id="num" class="categoriePet" required>
            <label for="description">Description : </label>
            <textarea id="description" name="description" required></textarea>
            <div class="flexRow align">

            </div>


            <div class="flexRow align flexCenter">
                <div class="circle flexCenter">
                    <span>3</span>
                </div>
                <p>Date et lieu de sa disparition</p>
            </div>
            <div class="flexRow align">
                <label for="date"> Perdu le :</label>
                <div class="categoriePet">
                    <input id="date" name="date" type="date" required>
                </div>
            </div>
            <label for="city">Ville :</label>
            <input type="text" name="city" placeholder="ex: Lille" id="city" class="categoriePet" required>

            <div class="flexRow align flexCenter">
                <div class="circle flexCenter">
                    <span>4</span>
                </div>
                <p>Importer une photo</p>
            </div>
            <input type="file" required>
            <div class="flexRow align">
                <input id="maskPhone" type="checkbox" name="maskPhone" value="masqué le téléphone">
                <label class="colorGrey" for="maskPhone">Masqué mon numéro de téléphone sur l'annonce.</label>
            </div>

            <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Publier">
        </form>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";