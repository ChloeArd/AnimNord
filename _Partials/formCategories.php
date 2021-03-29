<div class="flexRow">
    <div class="categories">
        <div class="categorie flexColumn flexCenter">
            <label class="width_100 center colorWhite categoriesAnimal" for="animal"> Animal : </label>
            <div class="flexRow align">
                <input type="radio" name="animal" value="chien">
                <span class="margin_0_20">Chien</span>
                <input type="radio" name="animal" value="chat">
                <span class="margin_0_20">Chat</span>
            </div>
        </div>
        <div class="categorie flexColumn flexCenter">
            <label class="colorWhite width_100 center categoriesAnimal" for="date"> Perdu le :</label>
            <input type="date">
        </div>
        <div class="categorie flexColumn flexCenter">
            <label class="colorWhite width_100 center categoriesAnimal" for="sexe"> Sexe :</label>
            <div class="flexRow align">
                <input  type="radio" name="sexe" value="Mâle">
                <span class="margin_0_20">Mâle</span>
                <input class="margin_0_20" type="radio" name="sexe" value="Femelle">
                <span class="margin_0_20">Femelle</span>
            </div>
        </div>
        <div class="categorie flexColumn flexCenter">
            <label class="colorWhite width_100 center categoriesAnimal" for="size"> Taille :</label>
            <select name="size" class="width_80 size15">
                <option>Très petite</option>
                <option>Petite</option>
                <option>Moyenne</option>
                <option>Grande</option>
                <option>Très grande</option>
            </select>
        </div>
        <div class="categorie flexColumn flexCenter">
            <label class="colorWhite width_100 center categoriesAnimal" for="fur"> Poils :</label>
            <select name="fur" class="width_80 size15">
                <option>Nue</option>
                <option>Court</option>
                <option>Mi-long</option>
                <option>Long</option>
            </select>
        </div>
        <div class="categorie flexColumn flexCenter">
            <label class="colorWhite width_100 center categoriesAnimal" for="colors"> Couleur du pelage :</label>
            <div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Noir">
                    <span class="margin_0_20">Noir</span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Blanc">
                    <span class="margin_0_20">Blanc</span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Marron">
                    <span class="margin_0_20">Marron</span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Gris">
                    <span class="margin_0_20">Gris</span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Beige">
                    <span class="margin_0_20">Beige</span>
                </div>
                <div class="flexRow align">
                    <input type="checkbox" name="colors" value="Roux">
                    <span class="margin_0_20">Roux</span>
                </div>
            </div>
        </div>
        <div class="categorie flexColumn flexCenter">
            <label class="colorWhite width_100 center categoriesAnimal" for="colors">Robe :</label>
            <select name="colors" class="width_80 size15">
                <option>Uni</option>
                <option>Tacheté</option>
                <option>Rayé</option>
                <option>Bringé</option>
                <option>Bicolor</option>
                <option>Tricolore</option>
            </select>
        </div>
        <div class="categorie flexColumn flexCenter">
            <label class="colorWhite width_100 center categoriesAnimal" for="race">Race :</label>
            <input type="text" name="race" placeholder="berger allemand">
        </div>
        <div class="categorie flexColumn flexCenter">
            <label class="colorWhite width_100 center categoriesAnimal" for="city">Ville :</label>
            <input type="text" name="city" placeholder="Lille">
        </div>
        <div class="flexCenter">
            <input type="submit" class="buttonEnter colorWhite" value="Rechercher" >
        </div>
    </div>