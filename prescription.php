<h2> Gestion des prescriptions </h2>

<br />
<?php
$unPrescription = null;

if (isset($_GET['action']) && isset($_GET['idprescription'])) {
    $action = $_GET['action'];
    $idPrescription = $_GET['idprescription'];
    switch ($action) {
        case "sup":
            $unControleur->deletePrescription($idPrescription);
            break;
        case "edit":
            $unPrescription = $unControleur->selectWherePrescription($idPrescription);
            break;
    }
}

$lesPrescriptions = $unControleur->selectAllPrescriptions();
$lesMedecins = $unControleur->selectAllMedecins();
$lesPatients = $unControleur->selectAllPatients();
require_once("vue/vue_insert_prescription.php");

if (isset($_POST['Modifier'])) {
    $unControleur->updatePrescription($_POST);
}

if (isset($_POST['Valider'])) {
    $unControleur->insertPrescription($_POST);
}
if (isset($_POST['Filtrer'])) {
    $mot = $_POST['mot'];

    $lesPrescriptions = $unControleur->selectLikePrescriptions($mot);
} else {
    $lesPrescriptions = $unControleur->selectAllPrescriptions();
    $lesMedecins = $unControleur->selectAllMedecins();
    $lesPatients = $unControleur->selectAllPatients();
}

require_once("vue/vue_prescription.php");
?>