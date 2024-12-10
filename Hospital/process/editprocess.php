// process/default_form_process.php
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    return;
}

if (
    !isset(
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['birthdate'],
        $_POST['phone'],
        $_POST['mail']
    )
) {
    header('location: ../index.php');
    return;
}

if (
    empty($_POST['firstname']) ||
    empty($_POST['lastname']) ||
    empty($_POST['birthdate']) ||
    empty($_POST['phone']) ||
    empty($_POST['mail'])
) {
    header('location: ../index.php');
    return;
}

// input sanitization
$firstname = htmlspecialchars(trim($_POST['firstname']));
$lastname = htmlspecialchars(trim($_POST['lastname']));
$birthdate = htmlspecialchars(trim($_POST['birthdate']));
$phone = htmlspecialchars(trim($_POST['phone']));
$mail = htmlspecialchars(trim($_POST['mail']));
$patientId = htmlspecialchars(trim($_GET['id']));;

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



$sql = "UPDATE patients
SET lastname = :lastname,
  firstname =:firstname,
  birthdate = :birthdate,
  phone =:phone,
  mail = :mail
WHERE id =" . $patientId;

try {

    $stmt = $pdo->prepare($sql);
    $patients = $stmt->execute([':lastname' => $lastname, ':firstname' => $firstname, ':birthdate' => $birthdate, ':phone' => $phone, ':mail' => $mail]);


} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

header('location:../liste-patients.php')
?> 
