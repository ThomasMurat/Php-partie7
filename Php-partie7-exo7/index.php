
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Php-Partie7-exo7</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <?php //on commence par vérifié si nos paramètres existent et si leur valeure sont correctes. Si c'est le cas on affichera les données transmisent.
            if ((isset($_GET['sexe']) && ($_GET['sexe'] == 'homme' || $_GET['sexe'] == 'femme')) && (!empty($_GET['Nom']) && preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_GET['Nom'])) && (!empty($_GET['Prénom']) && preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_GET['Prénom']))) {
                ?><p><?= 'Votre sexe est : ' . $_GET['sexe'] ?></p>
                <p><?= 'Votre Nom est : ' . $_GET['Nom'] ?></p>
                <p><?= 'Votre Prénom est : ' . $_GET['Prénom'] ?></p><?php
                if (isset($_FILES['myFile']) && $_FILES['myFile']['error'] == 0) { //on vérifie qu'un fichier à bien été envoyé et si oui on l'affiche
                    ?><p><?= 'Mon fichier est : ' . $_FILES['myFile']['name'] ?></p><?php
                }
            //On fait la même chose pour le cas ou on utilise la methode post
            }else if ((isset($_POST['sexe']) && ($_POST['sexe'] == 'homme' || $_POST['sexe'] == 'femme')) && (!empty($_POST['Nom']) && preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_POST['Nom'])) && (!empty($_POST['Prénom']) && preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_POST['Prénom']))) {
                ?><p><?= 'Votre sexe est : ' . $_POST['sexe'] ?></p>
                <p><?= 'Votre Nom est : ' . $_POST['Nom'] ?></p>
                <p><?= 'Votre Prénom est : ' . $_POST['Prénom'] ?></p><?php
                if (isset($_FILES['myFile']) && $_FILES['myFile']['error'] == 0) { //on vérifie qu'un fichier à bien été envoyé et si oui on l'affiche
                    ?><p><?= 'Mon fichier est : ' . $_FILES['myFile']['name'] ?></p><?php
                }
            }else { //On place le formulaire dans le else car ainsi il s'affichera uniquement si les informations nécessaires ne sont pas correctes
                ?><form id="myForm" method="post" action="index.php" enctype="multipart/form-data">
                        <ul>
                            <li>
                                <select name="sexe">
                                    <option value="default">Choisissez votre sexe</option>
                                    <option value="homme"<?php //Ici on fait en sorte de conserver notre choix si celui-ci est correcte
                                    if ((isset($_GET['sexe']) && $_GET['sexe'] == 'homme') || (isset($_POST['sexe']) && $_POST['sexe'] == 'homme') ) {
                                        echo ' selected';
                                    }
                                    ?>>Homme</option>
                                    <option value="femme"<?php //Ici on fait en sorte de conserver notre choix si celui-ci est correcte
                                    if ((isset($_GET['sexe']) && $_GET['sexe'] == 'femme') || (isset($_POST['sexe']) && $_POST['sexe'] == 'femme')) {
                                        echo ' selected';
                                    }
                                    ?>>Femme</option>
                                </select>
                            </li>
                            <?php
                            if ((isset($_GET['sexe']) && $_GET['sexe'] == 'default') || (isset($_POST['sexe']) && $_POST['sexe'] == 'default')) {
                                ?><p class="error"><?= 'Veuillez choisir votre sexe' ?></p><?php
                            }?>
                            <li>
                                <label for="lastname">Nom :</label>
                                <input id="lastname" type="text" name="Nom" value="<?php //Ici on fait en sorte de conserver notre choix si celui-ci est correcte
                                if (isset($_GET['Nom']) && preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_GET['Nom'])) {
                                    echo $_GET['Nom'];
                                }else if (isset($_POST['Nom']) && preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_POST['Nom'])) {
                                    echo $_POST['Nom'];
                                }
                                ?>"/>
                            </li>
                            <?php //Ici on affiche un message d'erreur soit si le champ n'est pas remplit, soit si la valeur n'est pas valide
                            if ((isset($_GET['Nom']) && empty($_GET['Nom'])) || (isset($_POST['Nom']) && empty($_POST['Nom']))) {
                                ?><p class="error"><?= 'Vous n\'avez pas spécifié de Nom' ?></p><?php
                            }else if ((isset($_GET['Nom']) && !preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_GET['Nom'])) || (isset($_POST['Nom']) && !preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_POST['Nom']))){
                                ?><p class="error"><?= 'Votre Nom n\'est pas valide' ?></p><?php
                            }?>
                            <li>
                                <label for="firstname">Prénom :</label>
                                <input id="firstname" type="text" name="Prénom" value="<?php //Ici on fait en sorte de conserver notre choix si celui-ci est correcte
                                if (isset($_GET['Prénom']) && preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_GET['Prénom'])) {
                                    echo $_GET['Prénom'];
                                }else if (isset($_POST['Prénom']) && preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_POST['Prénom'])) {
                                    echo $_POST['Prénom'];
                                }
                                ?>"/>
                            </li>
                            <?php //Ici on affiche un message d'erreur soit si le champ n'est pas remplit, soit si la valeur n'est pas valide
                            if ((isset($_GET['Prénom']) && empty($_GET['Prénom'])) || (isset($_POST['Prénom']) && empty($_POST['Prénom']))) {
                                ?><p class="error"><?= 'Vous n\'avez pas spécifié de Prénom' ?></p><?php
                            }else if ((isset($_GET['Prénom']) && !preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_GET['Prénom'])) || (isset($_POST['Prénom']) && !preg_match('/^[\p{L}][\p{L} -]{2,16}$/', $_POST['Prénom']))){
                                ?><p class="error"><?= 'Votre Prénom n\'est pas valide' ?></p><?php
                            }?>
                            <li><input type="file" name="myFile" /></li>
                            <li><input type="submit" value="Valider" /></li>
                        </ul>
                </form><?php
            }?>
    </body>
</html>