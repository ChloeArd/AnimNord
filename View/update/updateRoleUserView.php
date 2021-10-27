<?php
$manager = new \Model\User\UserManager();
$user = $manager->getUserID($_GET ['id']);

$roleManager = new \Model\Role\RoleManager();
$roles = $roleManager->getRoles();
?>

<main>
    <?php
    foreach ($user as $user1) {?>
        <h1 class="titleAccount">Changer le rôle de <?=$user1->getLastname() . " " . $user1->getFirstname() ?></h1>
        <form action="" method="post" class="marginAuto width_80">
            <div class="flexCenter flexColumn margin_15_0">
                <p class="margin_15_0 colorGrey">Actuellement : <span class="bold"><?=$user1->getRoleFk()->getRole() ?></span></p>
                <select id="role_fk" name="role_fk" class="margin_0_20">
                    <?php
                    foreach ($roles as $role) { ?>
                        <option value="<?=$role->getId() ?>"><?=$role->getRole() ?></option>
                        <?php
                    } ?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?=$user1->getId() ?>">
            <div class="flexCenter">
                <input type="submit" class="buttonEnter colorWhite" value="Changer">
            </div>
        </form>
        <?php
    } ?>
</main>

