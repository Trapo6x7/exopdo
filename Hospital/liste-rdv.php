<?php
require_once './connectdb/connect-db.php';

$sql = "SELECT * FROM `appointments`";

try {
    $stmt = $pdo->query($sql);
    $rdvs = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTEPATIENT</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>LISTE DES RDV</h1>
    <br><br>
    <section class="container">
    <a href="./ajout-rdv.php">AJOUTER UN RDV</a>
        <?php
        foreach ($rdvs as $rdv) {
        ?>
            <li class="container">Date : <?= $rdv['dateHour']  ?> | Patient : <?= $rdv['idPatients']  ?> <a href="./rendezvous.php?id=<?= $rdv['id']?>">VOIR +</a> </li>
        <?php
        }

        ?>
        <br><br>
       
        <a href="./index.php" class="center">ACCEUIL</a>
    </section>

</body>

</html>