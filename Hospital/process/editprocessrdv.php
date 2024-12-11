// process/default_form_process.php
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    return;
}

if (
    !isset(
        $_POST['dateHour'],
        $_POST['idPatients'],
    )
) {
    header('location: ../index.php');
    return;
}

if (
    empty($_POST['dateHour']) ||
    empty($_POST['idPatients'])
) {
    header('location: ../index.php');
    return;
}

// input sanitization
$dateHour = htmlspecialchars(trim($_POST['dateHour']));
$idPatients = htmlspecialchars(trim($_POST['idPatients']));
$rdvId = htmlspecialchars(trim($_GET['id']));;

// // a remplir en fonction de vos prerequis
// if(
//     strlen($firstName) > 50 ||
//     strlen($lastName) > 50 ||
//     $age > 120 ||
//     $age < 0
// ) {
//     // redirection si c'est pas bon
// }


// optionnel regex
// if (!preg_match('[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]', $email)) {
//     die("l'email est pas conforme");
// }

// etc .......



// mon code une fois que toute les données sont bonnes


require_once '../connectdb/connect-db.php';

// $patientId = $_GET["id"];



$sql = "UPDATE appointments
SET dateHour = :dateHour,
  idPatients =:idPatients,
WHERE id =" . $rdvId;

try {

    $stmt = $pdo->prepare($sql);
    $patients = $stmt->execute([':dateHour' => $dateHour, ':idPatients' => $idPatients]);


} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

header('location:../liste-patients.php')
?> 
