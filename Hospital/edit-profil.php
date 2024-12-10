<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJOUTPATIENT</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>EDITER LE PROFIL D'UN PATIENT</h1>

    <form action="./process/editprocess.php?id=<?=$patientId = $_GET["id"]?>" method="post" class="container">

        <label for="lastname">Nom du patient :</label>
        <input type="text" name="lastname" id="lastname">

        <label for="firstname">Prénom du patient :</label>
        <input type="text" name="firstname" id="firstname">

        <label for="birthdate">Date de naissance :</label>
        <input type="text" name="birthdate" id="birthdate">

        <label for="phone">Téléphone :</label>
        <input type="text" name="phone" id="phone">

        <label for="mail">Email :</label>
        <input type="email" name="mail" id="mail">

        <input type="submit" value="send">
    </form>
<?php

// $sql = "INSERT INTO patients VALUES (:lastname, :firstname,:birthdate,:phone,:mail)";

// try {
//     $stmt = $pdo->prepare($sql);
//     $patients = $stmt->execute([':lastname' => $lastname, ':firstname ' => $firstname, ':birthdate ' => $birthdate, ':phone ' => $phone, ':mail' => $mail]);
    
// } catch (PDOException $error) {
//     echo "Erreur lors de la requete : " . $error->getMessage();
// }

?>

    <a href="./index.php"  class="center">ACCEUIL</a>
</body>

</html>