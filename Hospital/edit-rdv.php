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
    <h1>MODIFIER UN RENDEZ VOUS</h1>

    <form action="./process/processrdv.php" method="post" class="container ">

        <label for="dateHour">Date et heure :</label>
        <input type="time" name="dateHour" id="dateHour">

        <label for="idPatients">Numéro du patient:</label>
        <input type="number" name="idPatients" id="idPatients">

        <input type="submit" value="send" class="submit"> 

           <a href="./index.php" class="center">ACCEUIL</a>
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


</body>

</html>