<h2> Gestion des medecins </h2>

<br />
<?php
$unMedecin = null;

if (isset($_GET['action']) && isset($_GET['idmedecin'])) {
    $action = $_GET['action'];
    $idMedecin = $_GET['idmedecin'];
    switch ($action) {
        case "sup":
            $unControleur->deleteMedecin($idMedecin);
            break;
        case "edit":
            $unMedecin = $unControleur->selectWhereMedecin($idMedecin);
            break;
    }
}

$lesMedecins = $unControleur->selectAllMedecins();
$lesPatients = $unControleur->selectAllPatients();
require_once("vue/vue_insert_medecin.php");

if (isset($_POST['Modifier'])) {
    $unControleur->updateMedecin($_POST);
    echo "<br/> Modification réussie du médecin <br/>";
}

if (isset($_POST['Valider'])) {
    $unControleur->insertMedecin($_POST);
}
if (isset($_POST['Filtrer'])) {
    $mot = $_POST['mot'];

    $lesMedecins = $unControleur->selectLikeMedecins($mot);
} else {
    $lesMedecins = $unControleur->selectAllMedecins();
    $lesPatients = $unControleur->selectAllPatients();
}

require_once("vue/vue_medecin.php");
?>