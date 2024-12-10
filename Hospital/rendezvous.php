<?php
require_once './connectdb/connect-db.php';

$sql = "SELECT * FROM `appointments`";

try {
    $stmt = $pdo->query($sql);
    $rdvs = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}
$rdvId = $_GET["id"];

foreach ($rdvs as $rdv) {

    if ($rdvId == $rdv['id']) {
        // var_dump('$rdv[' . $rdvId . ']');

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
                    <h1> Date : <?= $rdv['dateHour']  ?> | Numéro patient : <?= $rdv['idPatients']  ?> </h1>
                </article>
        <?php
    }
}
        ?>
        <br><br>
        <a href="./edit-rdv.php?id=<?= $rdv['id'] ?>" class="center">EDITER</a>




        <form action="./process/deleterdvprocess.php" method="post">
            <input type="hidden" name="idRdv" value="<?= $rdv['id'] ?>">
            <input class="center submit" type="submit" value="SUPPRIMER">
        </form>
 
            </section>

        </body>

        </html>