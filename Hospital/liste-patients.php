<?php
require_once './connectdb/connect-db.php';

$sql = "SELECT * FROM `patients`";

try {
    $stmt = $pdo->query($sql);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
    <h1>LISTE DES PATIENTS</h1>
    <br><br>
    <section class="container"> <a href="./ajout-patient.php" class='center'>AJOUTER UN PATIENT</a>
        <?php
        foreach ($patients as $patient) {
        ?>
            <li class="container">Nom : <?= $patient['lastname']  ?> | Prénom : <?= $patient['firstname']  ?> |
                Date de naissance : <?= $patient['birthdate']  ?> | Téléphone : <?= $patient['phone']  ?> |
                Mail : <?= $patient['mail']  ?> <a href="./profil-patient.php?id=<?= $patient['id'] ?>">VOIR +</a> </li>
        <?php
        }

        ?>
        <br><br>
        <a href="./index.php" class="center">ACCEUIL</a>
    </section>

</body>

</html>