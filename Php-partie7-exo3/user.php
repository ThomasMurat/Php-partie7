<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>formresult</title>
    </head>
    <body>
        <?php
        if(isset($_GET['Nom'])) {
            ?><p><?= 'Votre Nom est ' . $_GET['Nom'] . '.' ?></p><?php
        }
        if(isset($_GET['Prénom'])) {
            ?><p><?= 'Votre prénom est ' . $_GET['Prénom'] . '.' ?></p><?php
        }
        ?>
    </body>
</html>