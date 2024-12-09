<?php
require_once './utils/connect_db.php';

$sql = "SELECT * FROM `clients`";

try {
    $stmt = $pdo->query($sql);
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

$sql = "SELECT * FROM `shows`";

try {
    $stmt = $pdo->query($sql);
    $shows = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

$sql = "SELECT * FROM `clients` LIMIT 10";

try {
    $stmt = $pdo->query($sql);
    $clients2 = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

$sql = "SELECT * FROM clients INNER JOIN cards ON cards.cardNumber = clients.cardNumber INNER JOIN cardtypes ON cardtypes.id = cards.cardTypesId WHERE clients.card = 1 AND cards.cardTypesId = 1 AND cardtypes.id = 1;";

try {
    $stmt = $pdo->query($sql);
    $cartes = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

$sql = "SELECT *
FROM clients
WHERE lastName LIKE 'N%'
ORDER BY firstName";

try {
    $stmt = $pdo->query($sql);
    $lastnames = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

$sql = "SELECT performer,date,startTime,title FROM `shows` ORDER BY title";

try {
    $stmt = $pdo->query($sql);
    $shows2 = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

$sql = "SELECT lastName,firstName,birthDate,card,cardNumber FROM `clients` ORDER BY lastName ASC;";

try {
    $stmt = $pdo->query($sql);
    $fullclients = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ol>
        <h1>Liste des utilisateurs :</h1>

        <?php
        foreach ($clients as $client) {
        ?>
            <li>Nom : <?= $client['lastName']  ?> | Prénom : <?= $client['firstName']  ?> </li>

        <?php
        }

        ?>

    </ol>
    <br><br>
    <ol>
        <h1>Liste des spectacles :</h1>

        <?php
        foreach ($shows as $show) {
        ?>
            <li>Nom : <?= $show['title'] ?> </li>

        <?php
        }

        ?>

    </ol>
    <br><br>
    <ol>
        <h1>Liste des utilisateurs :</h1>

        <?php
        foreach ($clients2 as $client2) {
        ?>
            <li>Nom : <?= $client2['lastName']  ?> | Prénom : <?= $client2['firstName']  ?> </li>

        <?php
        }

        ?>

    </ol>
    <br><br>
    <ol>
        <h1>Liste des utilisateurs ayant une carte de fidélité:</h1>

        <?php
        foreach ($cartes as $carte) {
        ?>
            <li>Nom : <?= $carte['lastName']  ?> | Prénom : <?= $carte['firstName']  ?> </li>

        <?php
        }

        ?>

    </ol>
    <br><br>
    <ol>
        <h1>Liste des utilisateurs dont le nom commence par N:</h1>

        <?php
        if ($lastnames == null) {
            echo "Aucun nom ne commence par la lettre N.";
        }

        foreach ($lastnames as $lastname) {
        ?>
            <li>Nom : <?= $carte['lastName']  ?> | Prénom : <?= $carte['firstName']  ?> </li>

        <?php
        }

        ?>

    </ol>
    <br><br>
    <ol>
        <h1>Liste des spectacles et leurs details:</h1>

        <?php
        if ($shows2 == null) {
            echo "Aucun nom ne commence par la lettre N.";
        }

        foreach ($shows2 as $show2) {
        ?>
            <li> Spectacle par <?= $show2['performer']  ?>, le <?= $show2['date']  ?> à <?= $show2['startTime']  ?>. </li>

        <?php
        }

        ?>

    </ol>
    <br><br>
    <ul>
        <h1>Liste des clients</h1>

        <?php


        foreach ($fullclients as $fullclient) {
        ?>
            <li> Nom : <?= $fullclient['lastName']  ?></li>
            <br>
            <li> Nom : <?= $fullclient['firstName']  ?></li>
            <br>
            <li> Nom : <?= $fullclient['birthDate']  ?></li>
            <br>
            <?php
            if ($fullclient['card'] == 1) {
                echo   "<li> Carte validée. </li>";
            } else {
                echo   "<li> Pas de carte. </li>";
            }
            ?>
            <br>
            <?php
            if ($fullclient['cardNumber'] == null) {
                echo   "<li> Toujours pas de cartesgui. </li>";
            } else { ?>

                <li> Numéro de carte : <?= $fullclient['cardNumber'] ?> </li> 

            <?php }
            ?>

<br> <br>
        <?php
        }

        ?>

    </ul>
</body>

</html>