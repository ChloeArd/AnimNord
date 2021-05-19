<?php
date_default_timezone_set("Europe/Paris");
$manager = new \Model\Manager\MessageManager();
$messageUser = $manager->getMessages($_SESSION['id']);
?>
<main>
    <div class="flexRow flexCenter" id="menuAccount">
        <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
        <div class="separatorVertical"></div>
        <a href="../index.php?controller=adlost&action=view" class="colorBlue margin_0_20 linkAccount">Mes annonces</a>
        <div class="separatorVertical"></div>
        <a href="../index.php?controller=adlost&favorite=view" class="colorBlue margin_0_20 linkAccount">Mes favoris</a>
        <div class="separatorVertical"></div>
        <a href="../index.php?controller=message" class="colorBlue margin_0_20 linkAccount">Mes messages</a>
        <div class="separatorVertical"></div>
        <?php
        if ($_SESSION["role_fk"] === "1") { ?>
            <a href="../index.php?controller=user&action=all&search=ok" class="colorOrange margin_0_20 linkAccount">Gestion des utilisateurs</a>
            <div class="separatorVertical"></div>
            <?php
        } ?>
        <form method="post" action="../assets/php/disconnection.php">
            <input type="submit" class="disconnection buttonRed linkAccount margin_0_20" value="Me déconnecter">
        </form>
    </div>
    <h1 class="titleAccount colorWhite flexCenter">Mes messages</h1>
    <div class="flexRow">
        <a href="../index.php?controller=message&id=1" class="containerUsers">
            <h3 class="title2 flexCenter">Utilisateurs</h3>
            <div class="separatorHorizontal3"></div>
            <?php
            foreach ($messageUser as $message) {
                $managerUser = new \Model\User\UserManager();
                $users = $managerUser->getUserID($message->getRecipient());
                foreach ($users as $user) {
                ?>
                    <div class="flexRow margin_15_0 containerUser">
                        <div class="width_30 margin8">
                            <img class="width_100" src="../assets/img/adFind/de941aeee3b868197e73a2a0f76297.jpg">
                        </div>
                        <div class="flexColumn margin8">
                            <p class="bold colorBlack"><?=$user->getFirstname() . " " . $user->getLastname()?></p>
                            <p class="colorGrey">Nom de l'annonce</p>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </a>
        <div class="flexColumn messages">
            <div class="messages2" id="messagesUser">

            </div>
            <form action="" method="post" class="align formMessage">
                <textarea class="textareaMessage" id="inputMessage" name="message" placeholder="Envoyer un message..." required></textarea>
                <input type="hidden" id="inputDate" name="date" value="<?= date('Y-m-d H:i:s')?>">
                <input type="hidden" id="inputRecipient" name="recipient" value="<?=$_GET['id'] ?>">
                <input type="hidden" id="inputSender" name="sender" value="<?=$_SESSION['id'] ?>">
                <input type="hidden" name="firstname" id="inputFirstname" value="<?=$_SESSION['firstname'] ?>">
                <input type="submit" class="buttonEnter colorWhite width_20" name="send" id="buttonSend" value="Envoyer">
            </form>
        </div>

        <div class="containerUsers">
            <h3 class="title2 flexCenter">Prénom NOM</h3>
            <div class="separatorHorizontal3"></div>
            <div class="flexRow margin_15_0">
                <div class="width_30 margin8">
                    <img class="width_100" src="../assets/img/adFind/de941aeee3b868197e73a2a0f76297.jpg">
                </div>
                <div class="flexColumn flexCenter margin8">
                    <p>animal (sexe)</p>
                    <p class="colorGrey size12">Chiens ou chats perdus/trouvés</p>
                </div>
            </div>
            <div class="separatorHorizontal3"></div>
            <div class="margin8">
                <p>Date de la publication : <span class='colorBlue'>date</span></p>
                <p>Perdu le : <span class='colorBlue'>date</span></p>
                <p>Perdu à : <span class='colorBlue'>ville</span></p>
                <p>Nom : <span class="colorBlue">??nom??</span></p>
                <p>Race : <span class='colorBlue'>race</span></p>
                <p>Numéro du tatouage ou de la puce : <span class="colorBlue"> numéro</span></p>
                <p>Taille: <span class='colorBlue'>taille</span></p>
                <p>Poils: <span class='colorBlue'>poil</span></p>
                <p>Couleur du pelage : <span class='colorBlue'>couleurs</span></p>
                <p>Robe : <span class='colorBlue'>robe</span> </p>
                <p>Description : <span class='colorBlue'>description.......</span></p>
            </div>
        </div>
    </div>
</main>