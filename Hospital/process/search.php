
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    return;
}

if (
    !isset(
        $_POST['search']
    )
) {
    header('location: ../index.php');
    return;
}

if (
    empty($_POST['search'])
) {
    header('location: ../index.php');
    return;
}

// input sanitization
$search = htmlspecialchars(trim($_POST['search']));

var_dump($search);
die();

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

$sql = "SELECT * FROM patients WHERE lastname LIKE %" . $search ."%";

try {

    $stmt = $pdo->prepare($sql);
    $research = $stmt->execute([':lastname' => $search]);


} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

header("location: ../profil-patient.php?id={$patient['id']}");