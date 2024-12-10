
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    return;
}

if (
    !isset(
        $_POST['idRdv'],
    )
) {
    header('location: ../index.php');
    return;
}

if (
    empty($_POST['idRdv'])

) {
    header('location: ../index.php');
    return;
}


// input sanitization
$idRdv = htmlspecialchars(trim($_POST['idRdv']));

// mon code une fois que toute les données sont bonnes


require_once '../connectdb/connect-db.php';

$sql = "DELETE FROM `appointments` WHERE id = :id;";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $idRdv
    ]);
} catch (PDOException $error) {
    echo 'Erreur de requete :' . $error->getMessage();
}




header('location: ../liste-rdv.php');