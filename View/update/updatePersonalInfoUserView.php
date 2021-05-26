<?php
$manager = new \Model\User\UserManager();
$user = $manager->getUserID($_GET ['id']);

if ($_GET['id'] === $_SESSION['id']) { ?>
    <main>
        <div>
            <?php foreach ($user as $user1) {?>
                <h1 class="titleAccount">Modification des informations personnelles</h1>
                <div class="containerAccount">
                    <form action="" method="post">
                        <label for="lastname" class="colorBlack size20">Nom <span class="size15 required colorBlue">*</span></label>
                        <input type="text" name="lastname" id="lastname" class="inputWhite colorBlue" value="<?=$user1->getLastname() ?>" pattern=".*\S.*" required>
                        <label for="firstname" class="colorBlack size20">Prénom <span class="size15 colorBlue required">*</span></label>
                        <input type="text" name="firstname" id="firstname" class="inputWhite colorBlue" value="<?=$user1->getFirstname() ?>" pattern=".*\S.*" required>
                        <label for="email" class="colorBlack size20">Email <span class="size15 colorBlue required">*</span></label>
                        <input type="text" name="email" id="email" class="inputWhite colorBlue" value="<?=$user1->getEmail() ?>" pattern=".*\S.*" required>
                        <label for="phone" class="colorBlack size20">Téléphone <span class="size15 colorBlue required">*</span></label>
                        <input type="tel" name="phone" id="phone" class="inputWhite colorBlue" value="<?=$user1->getPhone() ?>" pattern=".*\S.*" required>
                        <input type="hidden" name="id" value="<?=$user1->getId() ?>">
                        <div class="flexCenter">
                            <input type="submit" class="buttonEnter colorWhite" value="Enregistrer">
                        </div>
                    </form>
                </div>
                <?php
            } ?>
        </div>
    </main>
<?php
}