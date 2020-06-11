<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Php-Partie7-exo4</title>
    </head>
    <body>
        <form method="get" action="index.php">
                <select name="sexe">
                    <option value="male">Homme</option>
                    <option value="female">Femme</option>
                </select>
                <label for="lastname">Nom :</label>
                <input id="lastname" type="text" name="Nom"/>
                <label for="firstname">Prénom :</label>
                <input id="lastname" type="text" name="Prénom"/>
                <input type="submit" value="Valider" />
        </form>
    </body>
</html>