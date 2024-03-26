<?php
session_start();
require_once("controleur/controleur.class.php");
//instanciation de la classe Controleur
$unControleur = new Controleur();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Doctolib</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/edded01f75.js" crossorigin="anonymous"></script>
</head>

<body>
    <center>

        <?php
        if (!isset($_SESSION['email'])) {
            require_once("vue/vue_connexion.php");
        }

        if (isset($_POST['seConnecter'])) {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $unPersonne = $unControleur->verifConnexion($email, $mdp);
            if ($unPersonne == null) {
                echo "<br/>Veuillez vérifier vos identifiants </br>";
            } else {
                $_SESSION['nom'] = $unPersonne['nom'];
                $_SESSION['prenom'] = $unPersonne['prenom'];
                $_SESSION['email'] = $unPersonne['email'];
                $_SESSION['tel'] = $unPersonne['tel'];
                $_SESSION['role'] = $unPersonne['role'];
                header("Location: index.php?page=0");
            }
        }

        if (isset($_SESSION['email'])) {
            echo '
                <div class="header">
                    <div class="social">
                        <ul class="social-list">
                            <li><a href="index.php?page=0"><i class="fa-solid fa-house" aria-hidden="true"></i></a></li>
                            <li><a href="index.php?page=5"><i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="logo">
                        <a href="index.php?page=0"><img class="logo-asset" src="images/Logo-Doctolib.png" widht="50" height="50"></a></img>
                    </div>

                    <div class="navigation">
                        <ul class="nav-list">
                            <li><a href="index.php?page=1">Patient</a></li>
                            <li><a href="index.php?page=2">Medecin</a></li>
                            <li><a href="index.php?page=3">Rendez-vous</a></li>
                            <li><a href="index.php?page=4">Prescription</a></li>
                        </ul>
                    </div>
                </div>
            ';


            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 0;
            }

            switch ($page) {
                case 0:
                    require_once("home.php");
                    break;
                case 1:
                    require_once("patient.php");
                    break;
                case 2:
                    require_once("medecin.php");
                    break;
                case 3:
                    require_once("rendezvous.php");
                    break;
                case 4:
                    require_once("prescription.php");
                    break;
                case 5:
                    session_destroy();
                    header("Location: index.php");
                    break;
                default:
                    require_once("vue/vue_erreur.php");
                    break;
            }
        }
        ?>

    </center>
</body>

</html>