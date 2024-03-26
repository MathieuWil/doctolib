<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des prescriptions</title>
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

<h3>Liste des prescriptions</h3>

<form method="post">
    Filtrer par : <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>

<table>
    <tr>
        <th>Id Prescription</th>
        <th>Date de prescription</th>
        <th>Médicament</th>
        <th>Patient</th>
        <th>Médecin</th>
        <th>Action</th>
    </tr>
    <?php
    if (isset($lesPrescriptions)) {
        foreach ($lesPrescriptions as $unPrescription) {
            echo "<tr>";
            echo "<td>" . $unPrescription['idprescription'] . "</td>";
            echo "<td>" . $unPrescription['dateprescription'] . "</td>";
            echo "<td>" . $unPrescription['medicament'] . "</td>";
            echo "<td>" . $unPatient['prenom'] . "</td>";
            echo "<td>" . $unMedecin['prenom'] . "</td>";
            echo "<td><a href='index.php?page=4&action=sup&idprescription=" . $unPrescription['idprescription'] . "'>
                  <img src='images/supprimer.png' height='20' width='20' alt='Supprimer'></a>";
            echo "<a href='index.php?page=4&action=edit&idprescription=" . $unPrescription['idprescription'] . "'>
                  <img src='images/editer.png' height='20' width='20' alt='Editer'></a></td>";
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>
