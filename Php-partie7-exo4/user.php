<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>formresult</title>
    </head>
    <body>
        <?php
        if(isset($_POST['Nom'])) {
            ?><p><?= 'Votre Nom est ' . $_POST['Nom'] . '.' ?></p><?php
        }
        if(isset($_POST['Prénom'])) {
            ?><p><?= 'Votre prénom est ' . $_POST['Prénom'] . '.' ?></p><?php
        }
        ?>
    </body>
</html>