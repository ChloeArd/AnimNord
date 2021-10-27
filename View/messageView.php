<?php
date_default_timezone_set("Europe/Paris");
$manager = new \Model\Manager\MessageManager();
$messageUser = $manager->getMessages($_SESSION['id']);
?>
<main>
    <div id="buttonAccount" class="buttonEnter colorWhite flexCenter">Mon compte <i class="fas fa-caret-down"></i></div>

    <div class="flexColumn marginAuto width_70" id="menuAccountMobile">
        <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes informations</a>
        <a href="../index.php?controller=adlost&action=view" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes annonces</a>
        <a href="../index.php?controller=adlost&favorite=view" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes favoris</a>
        <a href="../index.php?controller=message" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes messages</a>
        <?php
        if ($_SESSION["role_fk"] === "1") { ?>
            <a href="../index.php?controller=user&action=all" class="colorOrange margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorOrange"></i>Gestion des utilisateurs</a>
            <?php
        } ?>
        <form method="post" action="../assets/php/disconnection.php">
            <span class="margin_0_20 linkAccount"><i class="fas fa-sign-out-alt colorRed"></i><input type="submit" class="disconnection buttonRed" value="Me déconnecter"></span>
        </form>
    </div>

    <div class="flexRow flexCenter" id="menuAccount">
        <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
        <div class="separatorVertical"></div>
        <a href="../index.php?controller=adlost&action=view" class="colorBlue margin_0_20 linkAccount">Mes annonces</a>
        <div class="separatorVertical"></div>
        <a href="../index.php?controller=adlost&favorite=view&delete=ad" class="colorBlue margin_0_20 linkAccount">Mes favoris</a>
        <div class="separatorVertical"></div>
        <a href="../index.php?controller=message" class="colorBlue margin_0_20 linkAccount">Mes messages</a>
        <div class="separatorVertical"></div>
        <?php
        if ($_SESSION["role_fk"] === "1") { ?>
            <a href="../index.php?controller=user&action=all" class="colorOrange margin_0_20 linkAccount">Gestion des utilisateurs</a>
            <div class="separatorVertical"></div>
            <?php
        } ?>
        <form method="post" action="../assets/php/disconnection.php">
            <input type="submit" class="disconnection buttonRed linkAccount margin_0_20" value="Me déconnecter">
        </form>
    </div>

    <h1 class="titleAccount colorWhite flexCenter">Mes messages</h1>
    <div id="buttonUser" class="buttonEnter colorWhite flexCenter">Utilisateurs</div>
    <div id="userList" class="width_80 marginAuto">
    <?php
    foreach ($messageUser as $message) {
        $managerUser = new \Model\User\UserManager();
        $users = $managerUser->getUserID($message->getRecipient());
        foreach ($users as $user) { ?>
            <a href="../index.php?controller=message&id=<?=$user->getId() ?>" class="flexRow margin_15_0 align">
                <i class="fas fa-user-circle colorWhite size20"></i><p class="bold colorWhite"><?=$user->getFirstname() . " " . $user->getLastname()?></p>
            </a>
            <?php
        }
    }
    ?>
    </div>

    <div class="flexRow">
        <div class="containerUsers">
            <h3 class="categoriesAnimal colorWhite flexCenter">Utilisateurs</h3>
            <div class="separatorHorizontal3"></div>
            <?php
            foreach ($messageUser as $message) {
                $managerUser = new \Model\User\UserManager();
                $users = $managerUser->getUserID($message->getRecipient());
                foreach ($users as $user) { ?>
                    <a href="../index.php?controller=message&id=<?=$user->getId() ?>" class="flexRow margin_15_0 containerUser">
                        <div class="flexCenter width_20 margin8">
                            <i class="fas fa-user-circle colorGrey size40"></i>
                        </div>
                        <div class="flexCenter flexColumn margin8">
                            <p class="bold colorBlack"><?=$user->getFirstname() . " " . $user->getLastname()?></p>
                        </div>
                    </a>
                <?php
                }
            }  ?>
        </div>

        <div class="flexColumn messages">
            <div class="messages2" id="messagesUser">

            </div>
            <form id="formMessage" action="" method="post" class="align width_70 marginAuto">
                <textarea class="textareaMessage" id="inputMessage" name="message" placeholder="Envoyer un message..." required></textarea>
                <input type="hidden" id="inputDate" name="date" value="<?= date('Y-m-d H:i:s')?>">
                <input type="hidden" id="inputRecipient" name="recipient" value="<?=$_GET['id'] ?>">
                <input type="hidden" id="inputSender" name="sender" value="<?=$_SESSION['id'] ?>">
                <input type="hidden" name="firstname" id="inputFirstname" value="<?=$_SESSION['firstname'] ?>">
                <input type="submit" class="buttonEnter colorWhite width_20" name="send" id="buttonSend" value="Envoyer">
            </form>
        </div>
    </div>
</main>