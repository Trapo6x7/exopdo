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

    <?php
        foreach ($patients as $patient) {
        ?>
            <li>Nom : <?= $patient['lastname']  ?> | Prénom : <?= $patient['firstname']  ?> </li>

        <?php
        }

        ?>

     <a href="./ajout-patient.php">AJOUTER UN PATIENT</a>
</body>
</html>