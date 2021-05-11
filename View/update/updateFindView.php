<?php
date_default_timezone_set("Europe/Paris");
$id = $_GET['id'];
$manager = new \Model\AdFind\AdFindManager();
$adFind = $manager->getAd2($id);

foreach ($adFind as $ad) {
    ?>

    <main class="width_80">
        <h1 class="flexCenter title colorWhite">Modification d'une annonce pour chien ou chat perdu</h1>
        <form id="formAd" method="post" class="flexColumn width_50">
            <div class="flexRow align flexCenter">
                <div class="circle flexCenter">
                    <span>1</span>
                </div>
                <p>Informations sur l'animal <i class="fas fa-paw"></i></p>
            </div>
            <div class="flexRow align">
                <label for="animal" class="marginR">Animal : </label>
                <input id="animal" type="radio" name="animal" value="Chien" <?PHP if($ad->getAnimal() === 'Chien'){echo "checked";}?> required>
                <span class="margin_0_20"><i class="fas fa-dog"></i></span>
                <input id="animal" type="radio" name="animal" value="Chat" <?PHP if($ad->getAnimal() === 'Chat'){echo "checked";} ?> required>
                <span class="margin_0_20"><i class="fas fa-cat"></i></span>
            </div>
            <label for="sex"> Sexe :</label>
            <div class="categoriePet">
                <div class="flexRow align">
                    <input type="radio" name="sex" value="Mâle" <?PHP if($ad->getSex() !== 'Femelle' && $ad->getSex() !== 'Inconnu'){echo "checked";} ?> required>
                    <span class="margin_0_20">Mâle</span>
                </div>
                <div class="flexRow align">
                    <input type="radio" name="sex" value="Femelle" <?PHP if($ad->getSex() === 'Femelle'){echo "checked";} ?> required>
                    <span class="margin_0_20">Femelle</span>
                </div>
                <div class="flexRow align">
                    <input type="radio" name="sex" value="Inconnu" <?PHP if($ad->getSex() === 'Inconnu'){echo "checked";} ?> required>
                    <span class="margin_0_20">Inconnu</span>
                </div>
            </div>
            <label for="size"> Taille :</label>
            <select id="size" name="size" class="size15 categoriePet">
                <option><?=$ad->getSize() ?></option>
                <option>Très petite</option>
                <option>Petite</option>
                <option>Moyenne</option>
                <option>Grande</option>
                <option>Très grande</option>
            </select>
            <label for="fur"> Poils :</label>
            <select id="fur" name="fur" class="size15 categoriePet">
                <option><?=$ad->getFur() ?></option>
                <option>Nue</option>
                <option>Court</option>
                <option>Mi-long</option>
                <option>Long</option>
            </select>
            <label for="color"> Couleur du pelage :</label>
            <div class="categoriePet">
                <div class="flexRow align">
                    <input id="colors" type="checkbox" name="color" value="Noir" <?PHP if($ad->getColor() === 'Noir'){echo "checked";} ?>>
                    <span class="margin_0_20 borderBlack black"></span>
                </div>
                <div class="flexRow align">
                    <input id="colors" type="checkbox" name="color" value="Blanc" <?PHP if($ad->getColor() === 'Blanc'){echo "checked";} ?>>
                    <span class="margin_0_20 borderBlack"></span>
                </div>
                <div class="flexRow align">
                    <input id="colors" type="checkbox" name="color" value="Marron" <?PHP if($ad->getColor() === 'Marron'){echo "checked";} ?>>
                    <span class="margin_0_20 borderBlack brown"></span>
                </div>
                <div class="flexRow align">
                    <input id="colors" type="checkbox" name="color" value="Gris" <?PHP if($ad->getColor() === 'Gris'){echo "checked";} ?>>
                    <span class="margin_0_20 borderBlack grey"></span>
                </div>
                <div class="flexRow align">
                    <input id="colors" type="checkbox" name="color" value="Beige" <?PHP if($ad->getColor() === 'Beige'){echo "checked";} ?>>
                    <span class="margin_0_20 borderBlack beige"></span>
                </div>
                <div class="flexRow align">
                    <input id="colors" type="checkbox" name="color" value="Roux" <?PHP if($ad->getColor() === 'Roux'){echo "checked";} ?>>
                    <span class="margin_0_20 borderBlack orange"></span>
                </div>
            </div>
            <label for="dress">Robe :</label>
            <select id="dress" name="dress" class="size15 categoriePet">
                <option><?=$ad->getDress() ?></option>
                <option>Uni</option>
                <option>Tacheté</option>
                <option>Rayé</option>
                <option>Bringé</option>
                <option>Bicolor</option>
                <option>Tricolore</option>
            </select>
            <label for="race">Race :</label>
            <input type="text" name="race" id="race" placeholder="Ex : berger allemand" class="categoriePet" value="<?=$ad->getRace() ?>" pattern=".*\S.*" required>
            <label for="number">Numéro du tatouage ou de la puce :</label>
            <input type="text" name="number" id="number" class="categoriePet" value="<?=$ad->getNumber() ?>" pattern=".*\S.*">
            <label for="description">Description : </label>
            <textarea id="description" name="description" required><?=$ad->getDescription() ?></textarea>

            <div class="flexRow align flexCenter">
                <div class="circle flexCenter">
                    <span>2</span>
                </div>
                <p>Date et lieu de son apparition <i class="far fa-calendar-alt"></i><i class="fas fa-map-marker-alt"></i></p>
            </div>
            <div class="flexRow align">
                <label for="date_find"> Trouvé le :</label>
                <div class="categoriePet">
                    <input id="date_find" name="date_find" type="date" value="<?=$ad->getDateFind() ?>" required>
                </div>
            </div>
            <input id="date" name="date" type="hidden" required value="<?= date('Y-m-d')?>">
            <label for="city">Ville :</label>
            <select id="city" name="city" class="width_80 size15 categoriePet">
                <option><?=$ad->getCity() ?></option>
                <option>Abancourt (59268)</option>
                <option>Abscon (59215)</option>
                <option>Aibes (59149)</option>
                <option>Aix-en-Pévèle (59310)</option>
                <option>Allennes-les-Marais (59251)</option>
                <option>Amfroipret (59144)</option>
                <option>Anhiers (59194)</option>
                <option>Aniche (59580)</option>
                <option>Anneux (59400)</option>
                <option>Annœullin (59112)</option>
                <option>Anor (59186)</option>
                <option>Anstaing (59152)</option>
                <option>Anzin (59410)</option>
                <option>Arleux (59151)</option>
                <option>Armbouts-Cappel (59380)</option>
                <option>Armentières (59280)</option>
                <option>Arnèke (59285)</option>
                <option>Artres (59269)</option>
                <option>Assevent (59600)</option>
                <option>Attiches (59551)</option>
                <option>Aubencheul-au-Bac (59265)</option>
                <option>Auberchicourt (59165)</option>
                <option>Aubers (59249)</option>
                <option>Aubigny-au-Bac (59265)</option>
                <option>Aubry-du-Hainaut (59494)</option>
                <option>Auby (59950)</option>
                <option>Auchy-lez-Orchies (59310)</option>
                <option>Audignies (59570)</option>
                <option>Aulnoy-lez-Valenciennes (59300)</option>
                <option>Aulnoye-Aymeries (59620)</option>
                <option>Avelin (59710)</option>
                <option>Avesnelles (59440)</option>
                <option>Avesnes-le-Sec (59296)</option>
                <option>Avesnes-les-Aubert (59129)</option>
                <option>Avesnes-sur-Helpe (59440)</option>
                <option>Awoingt (59400)</option>
                <option>Bachant (59138)</option>
                <option>Bachy (59830)</option>
                <option>Bailleul (59270)</option>
                <option>Baisieux (59780)</option>
                <option>Baives (59132)</option>
                <option>Bambecque (59470)</option>
                <option>Banteux (59266)</option>
                <option>Bantigny (59554)</option>
                <option>Bantouzelle (59266)</option>
                <option>Bas-Lieu (59440)</option>
                <option>Bauvin (59221)</option>
                <option>Bavay (59570)</option>
                <option>Bavinchove (59670)</option>
                <option>Bazuel (59360)</option>
                <option>Beaucamps-Ligny (59134)</option>
                <option>Beaudignies (59530)</option>
                <option>Beaufort (59330)</option>
                <option>Beaumont-en-Cambrésis (59540)</option>
                <option>Beaurain (59730)</option>
                <option>Beaurepaire-sur-Sambre (59550)</option>
                <option>Beaurieux (59740)</option>
                <option>Beauvois-en-Cambrésis (59157)</option>
                <option>Bellaing (59135)</option>
                <option>Bellignies (59570)</option>
                <option>Bérelles (59740)</option>
                <option>Bergues (59380)</option>
                <option>Berlaimont (59145)</option>
                <option>Bermerain (59213)</option>
                <option>Bermeries (59570)</option>
                <option>Bersée (59235)</option>
                <option>Bersillies (59600)</option>
                <option>Berthen (59270)</option>
                <option>Bertry (59980)</option>
                <option>Béthencourt (59540)</option>
                <option>Bettignies (59600)</option>
                <option>Bettrechies (59570)</option>
                <option>Beugnies (59216)</option>
                <option>Beuvrages (59192)</option>
                <option>Beuvry-la-Forêt (59310)</option>
                <option>Bévillers (59217)</option>
                <option>Bierne (59380)</option>
                <option>Bissezeele (59380)</option>
                <option>Blaringhem (59173)</option>
                <option>Blécourt (59268)</option>
                <option>Boeschepe (59299)</option>
                <option>Boëseghem (59189)</option>
                <option>Bois-Grenier (59280)</option>
                <option>Bollezeele (59470)</option>
                <option>Bondues (59910)</option>
                <option>Borre (59190)</option>
                <option>Bouchain (59111)</option>
                <option>Boulogne-sur-Helpe (59440)</option>
                <option>Bourbourg (59630)</option>
                <option>Bourghelles (59830)</option>
                <option>Boursies (59400)</option>
                <option>Bousbecque (59166)</option>
                <option>Bousies (59222)</option>
                <option>Bousignies (59178)</option>
                <option>Bousignies-sur-Roc (59149)</option>
                <option>Boussières-en-Cambrésis (59217)</option>
                <option>Boussières-sur-Sambre (59330)</option>
                <option>Boussois (59168)</option>
                <option>Bouvignies (59870)</option>
                <option>Bouvines (59830)</option>
                <option>Bray-Dunes (59123)</option>
                <option>Briastre (59730)</option>
                <option>Brillon (59178)</option>
                <option>Brouckerque (59630)</option>
                <option>Broxeele (59470)</option>
                <option>Bruay-sur-l'Escaut (59860)</option>
                <option>Bruille-lez-Marchiennes (59490)</option>
                <option>Bruille-Saint-Amand (59199)</option>
                <option>Brunémont (59151)</option>
                <option>Bry (59144)</option>
                <option>Bugnicourt (59151)</option>
                <option>Busigny (59137)</option>
                <option>Buysscheure (59285)</option>
                <option>Caëstre (59190)</option>
                <option>Cagnoncles (59161)</option>
                <option>Cambrai (59400)</option>
                <option>Camphin-en-Carembault (59133)</option>
                <option>Camphin-en-Pévèle (59780)</option>
                <option>Cantaing-sur-Escaut (59267)</option>
                <option>Cantin (59169)</option>
                <option>Capelle (59213)</option>
                <option>Capinghem (59160)</option>
                <option>Cappelle-Brouck (59630)</option>
                <option>Cappelle-en-Pévèle (59242)</option>
                <option>Cappelle-la-Grande (59180)</option>
                <option>Carnières (59217)</option>
                <option>Carnin (59112)</option>
                <option>Cartignies (59244)</option>
                <option>Cassel (59670)</option>
                <option>Catillon-sur-Sambre (59360)</option>
                <option>Cattenières (59217)</option>
                <option>Caudry (59540)</option>
                <option>Caullery (59191)</option>
                <option>Cauroir (59400)</option>
                <option>Cerfontaine (59680)</option>
                <option>Château-l'Abbaye (59230)</option>
                <option>Chemy (59147)</option>
                <option>Chéreng (59152)</option>
                <option>Choisies (59740)</option>
                <option>Clairfayts (59740)</option>
                <option>Clary (59225)</option>
                <option>Cobrieux (59830)</option>
                <option>Colleret (59680)</option>
                <option>Comines (59560)</option>
                <option>Condé-sur-l'Escaut (59163)</option>
                <option>Coudekerque-Branche (59210)</option>
                <option>Courchelettes (59552)</option>
                <option>Cousolre (59149)</option>
                <option>Coutiches (59310)</option>
                <option>Craywick (59279)</option>
                <option>Crespin (59154)</option>
                <option>Crèvecœur-sur-l'Escaut (59258)</option>
                <option>Crochte (59380)</option>
                <option>Croix (59170)</option>
                <option>Croix-Caluyau (59222)</option>
                <option>Cuincy (59553)</option>
                <option>Curgies (59990)</option>
                <option>Cuvillers (59268)</option>
                <option>Cysoing (59830)</option>
                <option>Damousies (59680)</option>
                <option>Dechy (59187)</option>
                <option>Dehéries (59127)</option>
                <option>Denain (59220)</option>
                <option>Deûlémont (59890)</option>
                <option>Dimechaux (59740)</option>
                <option>Dimont (59216)</option>
                <option>Doignies (59400)</option>
                <option>Dompierre-sur-Helpe (59440)</option>
                <option>Don (59272)</option>
                <option>Douai (59500)</option>
                <option>Douchy-les-Mines (59282)</option>
                <option>Dourlers (59440)</option>
                <option>Drincham (59630)</option>
                <option>Dunkerque (59140)</option>
                <option>Ebblinghem (59173)</option>
                <option>Écaillon (59176)</option>
                <option>Eccles (59740)</option>
                <option>Éclaibes (59330)</option>
                <option>Écuélin (59620)</option>
                <option>Eecke (59114)</option>
                <option>Élesmes (59600)</option>
                <option>Élincourt (59127)</option>
                <option>Émerchicourt (59580)</option>
                <option>Emmerin (59320)</option>
                <option>Englefontaine (59530)</option>
                <option>Englos (59320)</option>
                <option>Ennetières-en-Weppes (59320)</option>
                <option>Ennevelin (59710)</option>
                <option>Eppe-Sauvage (59132)</option>
                <option>Erchin (59169)</option>
                <option>Eringhem (59470)</option>
                <option>Erquinghem-le-Sec (59320)</option>
                <option>Erquinghem-Lys (59193)</option>
                <option>Erre (59171)</option>
                <option>Escarmain (59213)</option>
                <option>Escaudain (59124)</option>
                <option>Escaudœuvres (59161)</option>
                <option>Escautpont (59278)</option>
                <option>Escobecques (59320)</option>
                <option>Esnes (59127)</option>
                <option>Esquelbecq (59470)</option>
                <option>Esquerchin (59553)</option>
                <option>Estaires (59940)</option>
                <option>Estourmel (59400)</option>
                <option>Estrées (59151)</option>
                <option>Estreux (59990)</option>
                <option>Estrun (59295)</option>
                <option>Eswars (59161)</option>
                <option>Eth (59144)</option>
                <option>Étrœungt (59219)</option>
                <option>Faches-Thumesnil (59155)</option>
                <option>Famars (59300)</option>
                <option>Faumont (59310)</option>
                <option>Féchain (59247)</option>
                <option>Feignies (59750)</option>
                <option>Felleries (59740)</option>
                <option>Fenain (59179)</option>
                <option>Férin (59169)</option>
                <option>Féron (59610)</option>
                <option>Ferrière-la-Grande (59680)</option>
                <option>Ferrière-la-Petite (59680)</option>
                <option>Flaumont-Waudrechies (59440)</option>
                <option>Flers-en-Escrebieux (59128)</option>
                <option>Flesquières (59267)</option>
                <option>Flêtre (59270)</option>
                <option>Flines-lès-Mortagne (59158)</option>
                <option>Flines-lez-Raches (59148)</option>
                <option>Floursies (59440)</option>
                <option>Floyon (59219)</option>
                <option>Fontaine-au-Bois (59550)</option>
                <option>Fontaine-au-Pire (59157)</option>
                <option>Fontaine-Notre-Dame (59400)</option>
                <option>Forest-en-Cambrésis (59222)</option>
                <option>Forest-sur-Marque (59510)</option>
                <option>Fourmies (59610)</option>
                <option>Fournes-en-Weppes (59134)</option>
                <option>Frasnoy (59530)</option>
                <option>Frelinghien (59236)</option>
                <option>Fresnes-sur-Escaut (59970)</option>
                <option>Fressain (59234)</option>
                <option>Fressies (59268)</option>
                <option>Fretin (59273)</option>
                <option>Fromelles (59249)</option>
                <option>Genech (59242)</option>
                <option>Ghissignies (59530)</option>
                <option>Ghyvelde (59122)</option>
                <option>Glageon (59132)</option>
                <option>Godewaersvelde (59270)</option>
                <option>Gognies-Chaussée (59600)</option>
                <option>Gommegnies (59144)</option>
                <option>Gondecourt (59147)</option>
                <option>Gonnelieu (59231)</option>
                <option>Gouzeaucourt (59231)</option>
                <option>Grand-Fayt (59244)</option>
                <option>Grand-Fort-Philippe (59153)</option>
                <option>Grande-Synthe (59760)</option>
                <option>Gravelines (59820)</option>
                <option>Gruson (59152)</option>
                <option>Guesnain (59287)</option>
                <option>Gussignies (59570)</option>
                <option>Gœulzin (59169)</option>
                <option>Hallennes-lez-Haubourdin (59320)</option>
                <option>Halluin (59250)</option>
                <option>Hamel (59151)</option>
                <option>Hantay (59496)</option>
                <option>Hardifort (59670)</option>
                <option>Hargnies (59138)</option>
                <option>Hasnon (59178)</option>
                <option>Haspres (59198)</option>
                <option>Haubourdin (59320)</option>
                <option>Haucourt-en-Cambrésis (59191)</option>
                <option>Haulchin (59121)</option>
                <option>Haussy (59294)</option>
                <option>Haut-Lieu (59440)</option>
                <option>Hautmont (59330)</option>
                <option>Haveluy (59255)</option>
                <option>Haverskerque (59660)</option>
                <option>Haynecourt (59268)</option>
                <option>Hazebrouck (59190)</option>
                <option>Hecq (59530)</option>
                <option>Hélesmes (59171)</option>
                <option>Hem (59510)</option>
                <option>Hem-Lenglet (59247)</option>
                <option>Hergnies (59199)</option>
                <option>Hérin (59195)</option>
                <option>Herlies (59134)</option>
                <option>Herrin (59147)</option>
                <option>Herzeele (59470)</option>
                <option>Hestrud (59740)</option>
                <option>Holque (59143)</option>
                <option>Hon-Hergies (59570)</option>
                <option>Hondeghem (59190)</option>
                <option>Hondschoote (59122)</option>
                <option>Honnechy (59980)</option>
                <option>Honnecourt-sur-Escaut (59266)</option>
                <option>Hordain (59111)</option>
                <option>Hornaing (59171)</option>
                <option>Houdain-lez-Bavay (59570)</option>
                <option>Houplin-Ancoisne (59263)</option>
                <option>Houplines (59116)</option>
                <option>Houtkerque (59470)</option>
                <option>Hoymille (59492)</option>
                <option>Illies (59480)</option>
                <option>Inchy (59540)</option>
                <option>Iwuy (59141)</option>
                <option>Jenlain (59144)</option>
                <option>Jeumont (59460)</option>
                <option>Jolimetz (59530)</option>
                <option>Killem (59122)</option>
                <option>La Bassée (59480)</option>
                <option>La Chapelle-d'Armentières (59930)</option>
                <option>La Flamengrie (59570)</option>
                <option>La Gorgue (59253)</option>
                <option>La Groise (59360)</option>
                <option>La Longueville (59570)</option>
                <option>La Madeleine (59110)</option>
                <option>La Neuville (59239)</option>
                <option>La Sentinelle (59174)</option>
                <option>Lallaing (59167)</option>
                <option>Lambersart (59130)</option>
                <option>Lambres-lez-Douai (59552)</option>
                <option>Landas (59310)</option>
                <option>Landrecies (59550)</option>
                <option>Lannoy (59390)</option>
                <option>Larouillies (59219)</option>
                <option>Lauwin-Planque (59553)</option>
                <option>Le Cateau-Cambrésis (59360)</option>
                <option>Le Doulieu (59940)</option>
                <option>Le Favril (59550)</option>
                <option>Le Maisnil (59134)</option>
                <option>Le Quesnoy (59530)</option>
                <option>Lecelles (59226)</option>
                <option>Lécluse (59259)</option>
                <option>Lederzeele (59143)</option>
                <option>Ledringhem (59470)</option>
                <option>Leers (59115)</option>
                <option>Leffrinckoucke (59495)</option>
                <option>Les Rues-des-Vignes (59258)</option>
                <option>Lesdain (59258)</option>
                <option>Lesquin (59810)</option>
                <option>Leval (59620)</option>
                <option>Lewarde (59287)</option>
                <option>Lez-Fontaine (59740)</option>
                <option>Lezennes (59260)</option>
                <option>Liessies (59740)</option>
                <option>Lieu-Saint-Amand (59111)</option>
                <option>Ligny-en-Cambrésis (59191)</option>
                <option>Lille (59000)</option>
                <option>Limont-Fontaine (59330)</option>
                <option>Linselles (59126)</option>
                <option>Locquignol (59530)</option>
                <option>Loffre (59182)</option>
                <option>Lompret (59840)</option>
                <option>Looberghe (59630)</option>
                <option>Loon-Plage (59279)</option>
                <option>Loos (59120)</option>
                <option>Lourches (59156)</option>
                <option>Louvignies-Quesnoy (59530)</option>
                <option>Louvil (59830)</option>
                <option>Louvroil (59720)</option>
                <option>Lynde (59173)</option>
                <option>Lys-lez-Lannoy (59390)</option>
                <option>Maing (59233)</option>
                <option>Mairieux (59600)</option>
                <option>Malincourt (59127)</option>
                <option>Marbaix (59440)</option>
                <option>Marchiennes (59870)</option>
                <option>Marcoing (59159)</option>
                <option>Marcq-en-Barœul (59700)</option>
                <option>Marcq-en-Ostrevent (59252)</option>
                <option>Maresches (59990)</option>
                <option>Maretz (59238)</option>
                <option>Marly (59770)</option>
                <option>Maroilles (59550)</option>
                <option>Marpent (59164)</option>
                <option>Marquette-en-Ostrevant (59252)</option>
                <option>Marquette-lez-Lille (59520)</option>
                <option>Marquillies (59274)</option>
                <option>Masnières (59241)</option>
                <option>Masny (59176)</option>
                <option>Mastaing (59172)</option>
                <option>Maubeuge (59600)</option>
                <option>Maulde (59158)</option>
                <option>Maurois (59980)</option>
                <option>Mazinghien (59360)</option>
                <option>Mecquignies (59570)</option>
                <option>Merckeghem (59470)</option>
                <option>Mérignies (59710)</option>
                <option>Merris (59270)</option>
                <option>Merville (59660)</option>
                <option>Méteren (59270)</option>
                <option>Millam (59143)</option>
                <option>Millonfosse (59178)</option>
                <option>Monceau-Saint-Waast (59620)</option>
                <option>Monchaux-sur-Écaillon (59224)</option>
                <option>Moncheaux (59283)</option>
                <option>Monchecourt (59234)</option>
                <option>Mons-en-Barœul (59370)</option>
                <option>Mons-en-Pévèle (59246)</option>
                <option>Montay (59360)</option>
                <option>Montigny-en-Cambrésis (59225)</option>
                <option>Montigny-en-Ostrevent (59182)</option>
                <option>Montrécourt (59227)</option>
                <option>Morbecque (59190)</option>
                <option>Mortagne-du-Nord (59158)</option>
                <option>Mouchin (59310)</option>
                <option>Moustier-en-Fagne (59132)</option>
                <option>Mouvaux (59420)</option>
                <option>Mœuvres (59400)</option>
                <option>Naves (59161)</option>
                <option>Neuf-Berquin (59940)</option>
                <option>Neuf-Mesnil (59330)</option>
                <option>Neuville-en-Avesnois (59218)</option>
                <option>Neuville-en-Ferrain (59960)</option>
                <option>Neuville-Saint-Rémy (59554)</option>
                <option>Neuville-sur-Escaut (59293)</option>
                <option>Neuvilly (59360)</option>
                <option>Nieppe (59850)</option>
                <option>Niergnies (59400)</option>
                <option>Nieurlet (59143)</option>
                <option>Nivelle (59230)</option>
                <option>Nomain (59310)</option>
                <option>Noordpeene (59670)</option>
                <option>Noyelles-lès-Seclin (59139)</option>
                <option>Noyelles-sur-Escaut (59159)</option>
                <option>Noyelles-sur-Sambre (59550)</option>
                <option>Noyelles-sur-Selle (59282)</option>
                <option>Obies (59570)</option>
                <option>Obrechies (59680)</option>
                <option>Ochtezeele (59670)</option>
                <option>Odomez (59970)</option>
                <option>Ohain (59132)</option>
                <option>Oisy (59195)</option>
                <option>Onnaing (59264)</option>
                <option>Oost-Cappel (59122)</option>
                <option>Orchies (59310)</option>
                <option>Ors (59360)</option>
                <option>Orsinval (59530)</option>
                <option>Ostricourt (59162)</option>
                <option>Oudezeele (59670)</option>
                <option>Oxelaëre (59670)</option>
                <option>Paillencourt (59295)</option>
                <option>Pecquencourt (59146)</option>
                <option>Pérenchies (59840)</option>
                <option>Péronne-en-Mélantois (59273)</option>
                <option>Petit-Fayt (59244)</option>
                <option>Petite-Forêt (59494)</option>
                <option>Phalempin (59133)</option>
                <option>Pitgam (59284)</option>
                <option>Poix-du-Nord (59218)</option>
                <option>Pommereuil (59360)</option>
                <option>Pont-à-Marcq (59710)</option>
                <option>Pont-sur-Sambre (59138)</option>
                <option>Potelle (59530)</option>
                <option>Pradelles (59190)</option>
                <option>Prémesques (59840)</option>
                <option>Préseau (59990)</option>
                <option>Preux-au-Bois (59288)</option>
                <option>Preux-au-Sart (59144)</option>
                <option>Prisches (59550)</option>
                <option>Prouvy (59121)</option>
                <option>Proville (59267)</option>
                <option>Provin (59185)</option>
                <option>Quaëdypre (59380)</option>
                <option>Quarouble (59243)</option>
                <option>Quérénaing (59269)</option>
                <option>Quesnoy-sur-Deûle (59890)</option>
                <option>Quiévelon (59680)</option>
                <option>Quiévrechain (59920)</option>
                <option>Quiévy (59214)</option>
                <option>Râches (59194)</option>
                <option>Radinghem-en-Weppes (59320)</option>
                <option>Raillencourt-Sainte-Olle (59554)</option>
                <option>Raimbeaucourt (59283)</option>
                <option>Rainsars (59177)</option>
                <option>Raismes (59590)</option>
                <option>Ramillies (59161)</option>
                <option>Ramousies (59177)</option>
                <option>Raucourt-au-Bois (59530)</option>
                <option>Recquignies (59245)</option>
                <option>Rejet-de-Beaulieu (59360)</option>
                <option>Renescure (59173)</option>
                <option>Reumont (59980)</option>
                <option>Rexpoëde (59122)</option>
                <option>Ribécourt-la-Tour (59159)</option>
                <option>Rieulay (59870)</option>
                <option>Rieux-en-Cambrésis (59277)</option>
                <option>Robersart (59550)</option>
                <option>Rombies-et-Marchipont (59990)</option>
                <option>Romeries (59730)</option>
                <option>Ronchin (59790)</option>
                <option>Roncq (59223)</option>
                <option>Roost-Warendin (59286)</option>
                <option>Rosult (59230)</option>
                <option>Roubaix (59100)</option>
                <option>Roucourt (59169)</option>
                <option>Rousies (59131)</option>
                <option>Rouvignies (59220)</option>
                <option>Rubrouck (59285)</option>
                <option>Ruesnes (59530)</option>
                <option>Rumegies (59226)</option>
                <option>Rumilly-en-Cambrésis (59281)</option>
                <option>Rœulx (59172)</option>
                <option>Sailly-lez-Cambrai (59554)</option>
                <option>Sailly-lez-Lannoy (59390)</option>
                <option>Sainghin-en-Mélantois (59262)</option>
                <option>Sainghin-en-Weppes (59184)</option>
                <option>Sains-du-Nord (59177)</option>
                <option>Saint-Amand-les-Eaux (59230)</option>
                <option>Saint-André-lez-Lille (59350)</option>
                <option>Saint-Aubert (59188)</option>
                <option>Saint-Aubin (59440)</option>
                <option>Saint-Aybert (59163)</option>
                <option>Saint-Benin (59360)</option>
                <option>Saint-Georges-sur-l'Aa (59820)</option>
                <option>Saint-Hilaire-lez-Cambrai (59292)</option>
                <option>Saint-Hilaire-sur-Helpe (59440)</option>
                <option>Saint-Jans-Cappel (59270)</option>
                <option>Saint-Martin-sur-Écaillon (59213)</option>
                <option>Saint-Momelin (59143)</option>
                <option>Saint-Pierre-Brouck (59630)</option>
                <option>Saint-Python (59730)</option>
                <option>Saint-Remy-Chaussée (59620)</option>
                <option>Saint-Remy-du-Nord (59330)</option>
                <option>Saint-Saulve (59880)</option>
                <option>Saint-Souplet (59360)</option>
                <option>Saint-Sylvestre-Cappel (59114)</option>
                <option>Saint-Vaast-en-Cambrésis (59188)</option>
                <option>Saint-Waast (59570)</option>
                <option>Sainte-Marie-Cappel (59670)</option>
                <option>Salesches (59218)</option>
                <option>Salomé (59496)</option>
                <option>Saméon (59310)</option>
                <option>Sancourt (59268)</option>
                <option>Santes (59211)</option>
                <option>Sars-et-Rosières (59230)</option>
                <option>Sars-Poteries (59216)</option>
                <option>Sassegnies (59145)</option>
                <option>Saultain (59990)</option>
                <option>Saulzoir (59227)</option>
                <option>Sebourg (59990)</option>
                <option>Seclin (59113)</option>
                <option>Sémeries (59440)</option>
                <option>Semousies (59440)</option>
                <option>Sepmeries (59269)</option>
                <option>Sequedin (59320)</option>
                <option>Séranvillers-Forenville (59400)</option>
                <option>Sercus (59173)</option>
                <option>Sin-le-Noble (59450)</option>
                <option>Socx (59380)</option>
                <option>Solesmes (59730)</option>
                <option>Solre-le-Château (59740)</option>
                <option>Solrinnes (59740)</option>
                <option>Somain (59490)</option>
                <option>Sommaing (59213)</option>
                <option>Spycker (59380)</option>
                <option>Staple (59190)</option>
                <option>Steenbecque (59189)</option>
                <option>Steene (59380)</option>
                <option>Steenvoorde (59114)</option>
                <option>Steenwerck (59181)</option>
                <option>Strazeele (59270)</option>
                <option>Taisnières-en-Thiérache (59550)</option>
                <option>Taisnières-sur-Hon (59570)</option>
                <option>Templemars (59175)</option>
                <option>Templeuve-en-Pévèle (59242)</option>
                <option>Terdeghem (59114)</option>
                <option>Téteghem-Coudekerque-Village (59229)</option>
                <option>Thiant (59224)</option>
                <option>Thiennes (59189)</option>
                <option>Thivencelle (59163)</option>
                <option>Thumeries (59239)</option>
                <option>Thun-l'Évêque (59141)</option>
                <option>Thun-Saint-Amand (59158)</option>
                <option>Thun-Saint-Martin (59141)</option>
                <option>Tilloy-lez-Cambrai (59554)</option>
                <option>Tilloy-lez-Marchiennes (59870)</option>
                <option>Toufflers (59390)</option>
                <option>Tourcoing (59200)</option>
                <option>Tourmignies (59551)</option>
                <option>Trélon (59132)</option>
                <option>Tressin (59152)</option>
                <option>Trith-Saint-Léger (59125)</option>
                <option>Troisvilles (59980)</option>
                <option>Uxem (59229)</option>
                <option>Valenciennes (59300)</option>
                <option>Vendegies-au-Bois (59218)</option>
                <option>Vendegies-sur-Écaillon (59213)</option>
                <option>Vendeville (59175)</option>
                <option>Verchain-Maugré (59227)</option>
                <option>Verlinghem (59237)</option>
                <option>Vertain (59730)</option>
                <option>Vicq (59970)</option>
                <option>Viesly (59271)</option>
                <option>Vieux-Berquin (59232)</option>
                <option>Vieux-Condé (59690)</option>
                <option>Vieux-Mesnil (59138)</option>
                <option>Vieux-Reng (59600)</option>
                <option>Villeneuve-d'Ascq (59491)</option>
                <option>Villereau (59530)</option>
                <option>Villers-au-Tertre (59234)</option>
                <option>Villers-en-Cauchies (59188)</option>
                <option>Villers-Guislain (59297)</option>
                <option>Villers-Outréaux (59142)</option>
                <option>Villers-Plouich (59231)</option>
                <option>Villers-Pol (59530)</option>
                <option>Villers-Sire-Nicole (59600)</option>
                <option>Volckerinckhove (59470)</option>
                <option>Vred (59870)</option>
                <option>Wahagnies (59261)</option>
                <option>Walincourt-Selvigny (59127)</option>
                <option>Wallers (59135)</option>
                <option>Wallers-en-Fagne (59132)</option>
                <option>Wallon-Cappel (59190)</option>
                <option>Wambaix (59400)</option>
                <option>Wambrechies (59118)</option>
                <option>Wandignies-Hamage (59870)</option>
                <option>Wannehain (59830)</option>
                <option>Wargnies-le-Grand (59144)</option>
                <option>Wargnies-le-Petit (59144)</option>
                <option>Warhem (59380)</option>
                <option>Warlaing (59870)</option>
                <option>Warneton (59560)</option>
                <option>Wasnes-au-Bac (59252)</option>
                <option>Wasquehal (59290)</option>
                <option>Watten (59143)</option>
                <option>Wattignies (59139)</option>
                <option>Wattignies-la-Victoire (59680)</option>
                <option>Wattrelos (59150)</option>
                <option>Wavrechain-sous-Denain (59220)</option>
                <option>Wavrechain-sous-Faulx (59111)</option>
                <option>Wavrin (59136)</option>
                <option>Waziers (59119)</option>
                <option>Wemaers-Cappel (59670)</option>
                <option>Wervicq-Sud (59117)</option>
                <option>West-Cappel (59380)</option>
                <option>Wicres (59134)</option>
                <option>Wignehies (59212)</option>
                <option>Willems (59780)</option>
                <option>Willies (59740)</option>
                <option>Winnezeele (59670)</option>
                <option>Wormhout (59470)</option>
                <option>Wulverdinghe (59143)</option>
                <option>Wylder (59380)</option>
                <option>Zegerscappel (59470)</option>
                <option>Zermezeele (59670)</option>
                <option>Zuydcoote (59123)</option>
                <option>Zuytpeene (59670)</option>
            </select>
            <input name="user_fk"  type="hidden" id="user_fk" value="<?= $_SESSION['id']?>">
            <input type="hidden" name="id" id="id" value="<?=$ad->getId() ?>">
            <div class="flexRow align flexCenter">
                <div class="circle flexCenter">
                    <span>3</span>
                </div>
                <p>Importer une photo <i class="far fa-image"></i></p>
            </div>
            <!--<input type="file" name="picture" id="picture" > -->
            <input type="hidden" name="picture" value="<?=$ad->getPicture() ?>">

            <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Modifier">
        </form>
    </main>
    <?php
}