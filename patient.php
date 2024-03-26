<h2> Gestion des patients </h2>

<br />
<?php
$unPatient = null;

if (isset($_GET['action']) && isset($_GET['idpatient'])) {
    $action = $_GET['action'];
    $idPatient = $_GET['idpatient'];
    switch ($action) {
        case "sup":
            $unControleur->deletePatient($idPatient);
            break;
        case "edit":
            $unPatient = $unControleur->selectWherePatient($idPatient);
            break;
    }
}

$lesPatients = $unControleur->selectAllPatients();
require_once("vue/vue_insert_patient.php");

if (isset($_POST['Modifier'])) {
    $unControleur->updatePatient($_POST);
    echo "<br/> Modification réussie du patient <br/>";
}

if (isset($_POST['Valider'])) {
    $unControleur->insertPatient($_POST);
}
if (isset($_POST['Filtrer'])) {
    $mot = $_POST['mot'];

    $lesPatients = $unControleur->selectLikePatients($mot);
} else {
    $lesPatients = $unControleur->selectAllPatients();
}

require_once("vue/vue_patient.php");
?>