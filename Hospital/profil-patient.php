<?php
require_once './connectdb/connect-db.php';

$sql = "SELECT * FROM `patients`";

try {
    $stmt = $pdo->query($sql);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}
$patientId = $_GET["id"];

foreach ($patients as $patient) {

    if ($patientId == $patient['id']) {
        var_dump('$patient[' . $patientId . ']');
   
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
           <a href="./edit-profil.php?id=<?= $patient['id']?>"  class="center">EDITER</a>
    </section> 

</body>

</html>
<?php
}
}
?>