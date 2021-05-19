<?php
use Model\DB;

$return = "";
$id = "";

if (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Le rôle a bien été modifié !";
            break;
    }
}

if (isset($var['users'])) { ?>
    <div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
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

        <?php
    $bdd = DB::getInstance();

    if (isset($_POST['firstname']) || isset($_POST['lastname']) ||  isset($_POST['role_fk'])) {
        $role = intval($_POST['role_fk']);

        $req = "SELECT * FROM user WHERE role_fk LIKE '%$role%'";

        if(!empty( $_POST['firstname'])) {
            $firstname = htmlentities(ucfirst($_POST['firstname']));
            $req .= " AND firstname LIKE '%$firstname%'";
        }

        if (!empty($_POST['lastname'])) {
            $lastname = htmlentities(strtoupper($_POST['lastname']));
            $req .= " AND lastname LIKE '%$lastname%'";
        }
        $req .= " ORDER BY lastname ASC";


        $exec = $bdd->query($req);
        $nb_resultats = $exec->rowCount(); // count a result

        if($nb_resultats != 0) { ?>
            <form method="post" action="" class="flexRow width_80 flexCenter">
                <input class="margin_0_20" type="text" name="firstname" placeholder="Prénom">
                <input class="margin_0_20" type="text" name="lastname" placeholder="Nom">
                <select name="role_fk" class="margin_0_20">
                    <option name="role_fk" value="2">Utilisateur</option>
                    <option name="role_fk" value="3">Modérateur</option>
                    <option name="role_fk" value="1">Administrateur</option>
                </select>
                <input type="submit" class="buttonGreen colorWhite" value="Chercher">
            </form>
            <div class="flexCenter">
                <?php
                if($nb_resultats > 1) {?>
                    <p class="colorBlue">Résultat de votre recherche : <span class="bold colorRed"><?=$nb_resultats?> résultats trouvés.</span></p>
                    <?php
                }
                else { ?>
               <p class="colorBlue">Résultat de votre recherche : <span class="bold colorRed"><?=$nb_resultats?> résultat trouvé.</span></p>
                    <?php
                } ?>
            </div>

            <?php
            foreach ($exec as $donnees) { ?>
                <div class="containerAccount table">
                    <p class="colorBlack size20">Nom : <span class="colorBlue"><?=$donnees["lastname"]?></span>
                        <a href="../index.php?controller=user&action=delete&id=<?=$donnees['id'] ?>" class="colorBlack"><i class="far fa-trash-alt"></i></a>
                    </p>
                    <p class="colorBlack size20">Prénom : <span class="colorBlue"><?=$donnees["firstname"]?></span></p>
                    <p class="colorBlack size20">Email : <span class="colorBlue"><?=$donnees["email"]?></span></p>
                    <p class="colorBlack size20">Téléphone : <span class="colorBlue"><?=$donnees["phone"]?></span></p>
                    <p class="colorBlack size20">Rôle : <span class="colorBlue">
                            <?php
                            if ($donnees["role_fk"] == 1) { ?>
                                <span class="colorBlue">Administrateur</span>
                                <?php
                            }
                            elseif ($donnees["role_fk"] == 2) { ?>
                                <span class="colorBlue">Utilisateur</span>
                               <?php
                            }
                           else { ?>
                               <span class="colorBlue">Modérateur</span>
                               <?php
                           } ?>
                        <a href="../index.php?controller=user&action=updateRole&id=<?=$donnees['id'] ?>" class="colorBlack"><i class="far fa-edit"></i></a>
                    </p>
                </div>
                <?php
            }
        }
        else {?>
            <form method="post" action="" class="flexRow width_80 flexCenter">
                <input class="margin_0_20" type="text" name="firstname" placeholder="Prénom">
                <input class="margin_0_20" type="text" name="lastname" placeholder="Nom">
                <select name="role_fk" class="margin_0_20">
                    <option name="role_fk" value="2">Utilisateur</option>
                    <option name="role_fk" value="3">Modérateur</option>
                    <option name="role_fk" value="1">Administrateur</option>
                </select>
                <input type="submit" class="buttonGreen colorWhite" value="Chercher">
            </form>
            <div class="flexCenter flexColumn">
                <h2 class="colorRed margin_15_0">Pas de résultats !</h2>
                <a class="colorGrey underline" href="../index.php?controller=user&action=all"><i class="fas fa-hand-point-right"></i>
                    Afficher tous les utilisateurs <i class="fas fa-hand-point-left"></i>
                </a>
            </div>
            <?php
        }
    }
    else { ?>
        <div>
            <form method="post" action="" class="flexRow width_80 flexCenter">
                <input class="margin_0_20" type="text" name="firstname" placeholder="Prénom">
                <input class="margin_0_20" type="text" name="lastname" placeholder="Nom">
                <select name="role_fk" class="margin_0_20">
                    <option name="role_fk" value="2">Utilisateur</option>
                    <option name="role_fk" value="3">Modérateur</option>
                    <option name="role_fk" value="1">Administrateur</option>
                </select>
                <input type="submit" class="buttonGreen colorWhite" value="Chercher">
            </form>
            <h1 class="titleAccount">Tous les utilisateurs</h1>
            <?php
            foreach ($var['users'] as $users) {?>
                <div class="containerAccount table">
                    <p class="colorBlack size20">Nom : <span class="colorBlue"><?=$users->getLastname() ?></span>
                        <a href="../index.php?controller=user&action=delete&id=<?=$users->getId() ?>" class="colorBlack"><i class="far fa-trash-alt"></i></a>
                    </p>
                    <p class="colorBlack size20">Prénom : <span class="colorBlue"><?=$users->getFirstname() ?></span></p>
                    <p class="colorBlack size20">Email : <span class="colorBlue"><?=$users->getEmail() ?></span></p>
                    <p class="colorBlack size20">Téléphone : <span class="colorBlue"><?=$users->getPhone() ?></span></p>
                    <p class="colorBlack size20">Rôle : <span class="colorBlue"><?=$users->getRoleFk()->getRole() ?></span>
                        <a href="../index.php?controller=user&action=updateRole&id=<?=$users->getId() ?>" class="colorBlack"><i class="far fa-edit"></i></a>
                    </p>
                </div>
                <?php
            }?>
        </div>
    </main>
<?php
    }
}