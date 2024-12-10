<?php
require_once './connectdb/connect-db.php';

if (isset($_GET["id"])) {
    $patientId = $_GET["id"];
} else {
    die('ID manquant');
}

$sql = "SELECT * FROM `patients` WHERE id = :id";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $patientId,
    ]);

    $patient = $stmt->fetch(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
    <section class="container flex">
        <img src="./droit-des-patients-post-1024x893.jpg" alt="le vieuxgui" class="imgpatient">
        <article>
            <h1> Nom : <?= $patient['lastname']  ?> | Prénom : <?= $patient['firstname']  ?> </h1>
            <h2> Date de naissance : <?= $patient['birthdate']  ?></h2>
            <p>Téléphone : <?= $patient['phone']  ?> | Mail : <?= $patient['mail']  ?></p>
        </article>
        <br><br>

        <?php
        $sql = "SELECT * FROM `appointments` WHERE idPatients = :idPatient";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':idPatient' => $patient['id'],
            ]);
            $rdvs = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

        } catch (PDOException $error) {
            echo "Erreur lors de la requete : " . $error->getMessage();
        }

        if (!empty($rdvs)) {


            foreach ($rdvs as $rdv) {


        ?>
                <li class="container">Date : <?= $rdv['dateHour']  ?></li>
        <?php
            }
        }
        ?>
        <a href="./edit-profil.php?id=<?= $patient['id'] ?>" class="center">EDITER</a>

        <form action="./process/delpatientprocess.php" method="post">
            <input type="hidden" name="idPatient" value="<?= $patient['id'] ?>">
            <input class="center submit" type="submit" value="SUPPRIMER">
        </form>
    </section>

</body>

</html>