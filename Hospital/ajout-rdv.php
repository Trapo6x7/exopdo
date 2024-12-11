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
    <title>AJOUTPATIENT</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>AJOUTER UN RENDEZ VOUS</h1>

    <form action="./process/editprocessrdv.php" method="post" class="container ">

        <label for="dateHour">Date et heure :</label>
        <input type="datetime-local" name="dateHour" id="dateHour">

        <label for="idPatients">Patient:</label>
        <select name="idPatients" id="idPatients">
        
<?php
foreach ($patients as $patient){
?> 
    <option value="<?= $patient['id']?>"><?= $patient['firstname']?> <?= $patient['lastname']?></option>
<?php  
}
?>
        </select>

        <input type="submit" value="send" class="submit"> 

           <a href="./index.php" class="center">ACCUEIL</a>
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