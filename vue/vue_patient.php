<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des patients</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #1599E3;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        img {
            vertical-align: middle;
        }
    </style>
</head>
<body>

<h3>Liste des patients</h3>

<form method="post">
    Filtrer par : <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>

<table>
    <tr>
        <th>Id Patient</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>Date de naissance</th>
        <th>Code postal</th>
        <th>Sexe</th>
        <th>Médecin traitant</th>
    </tr>
    <?php
    if (isset($lesPatients)) {
        foreach ($lesPatients as $unPatient) {
            echo "<tr>";
            echo "<td>" . $unPatient['idpatient'] . "</td>";
            echo "<td>" . $unPatient['nom'] . "</td>";
            echo "<td>" . $unPatient['prenom'] . "</td>";
            echo "<td>" . $unPatient['adresse'] . "</td>";
            echo "<td>" . $unPatient['ville'] . "</td>";
            echo "<td>" . $unPatient['telephone'] . "</td>";
            echo "<td>" . $unPatient['email'] . "</td>";
            echo "<td>" . $unPatient['dateNaissance'] . "</td>";
            echo "<td>" . $unPatient['codePostal'] . "</td>";
            echo "<td>" . $unPatient['sexe'] . "</td>";

            // Fetch doctor's name and surname based on idmedecin
            $medecinInfo = $unControleur->selectWhereMedecin($unPatient['idmedecin']);

            // Display doctor's name and surname
            echo "<td>" . $medecinInfo['nom'] . " " . $medecinInfo['prenom'] . "</td>";

            echo "<td><a href='index.php?page=1&action=sup&idpatient=" . $unPatient['idpatient'] . "'>
                  <img src='images/supprimer.png' height='20' width='20' alt='Supprimer'></a>";
            echo "<a href='index.php?page=1&action=edit&idpatient=" . $unPatient['idpatient'] . "'>
                  <img src='images/editer.png' height='20' width='20' alt='Editer'></a></td>";
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>
