
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    return;
}

if (
    !isset(
        $_POST['idPatient']
    )
) {
    header('location: ../index.php');
    return;
}


if (empty( $_POST['idPatient'])
   
) {
    header('location: ../index.php');
    return;
}

// input sanitization
$patientId = htmlspecialchars(trim($_POST['idPatient']));

// mon code une fois que toute les données sont bonnes

require_once '../connectdb/connect-db.php';

// DELETE RDV

$sqlDeleteRdv = "DELETE FROM `appointments` WHERE idPatients = :id";

try {
    $stmt = $pdo->prepare($sqlDeleteRdv);
    $stmt->execute([
        ':id' => $patientId
    ]);
} catch (PDOException $error) {
    echo 'Erreur de requete :' . $error->getMessage();
}

// DELETE PATIENT

$sqlDeletePatient = "DELETE FROM `patients` WHERE id = :id";

try {
    $stmt = $pdo->prepare($sqlDeletePatient);
    $stmt->execute([
        ':id' => $patientId
    ]);
} catch (PDOException $error) {
    echo 'Erreur de requete :' . $error->getMessage();
}

header('location: ../liste-patients.php');
?> 