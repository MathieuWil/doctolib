<h2> Gestion des rendez-vous </h2>

<br />
<?php
$unRendezvous = null;

if (isset($_GET['action']) && isset($_GET['idrendezvous'])) {
    $action = $_GET['action'];
    $idRendezvous = $_GET['idrendezvous'];
    switch ($action) {
        case "sup":
            $unControleur->deleteRendezvous($idRendezvous);
            break;
        case "edit":
            $unRendezvous = $unControleur->selectWhereRendezvous($idRendezvous);
            break;
    }
}

$lesRendezvous = $unControleur->selectAllRendezvous();
$lesMedecins = $unControleur->selectAllMedecins();
$lesPatients = $unControleur->selectAllPatients();
require_once("vue/vue_insert_rendezvous.php");

if (isset($_POST['Modifier'])) {
    $unControleur->updateRendezvous($_POST);
    echo "<br/> Modification du rendez-vous réussie <br/>";
}

if (isset($_POST['Valider'])) {
    $unControleur->insertRendezvous($_POST);
}
if (isset($_POST['Filtrer'])) {
    $mot = $_POST['mot'];

    $lesRendezvous = $unControleur->selectLikeRendezvous($mot);
} else {
    $lesRendezvous = $unControleur->selectAllRendezvous();
    $lesMedecins = $unControleur->selectAllMedecins();
    $lesPatients = $unControleur->selectAllPatients();
}

require_once("vue/vue_rendezvous.php");
?>