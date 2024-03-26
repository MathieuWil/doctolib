<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des rendez-vous</title>
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

<h3>Liste des rendez-vous</h3>

<form method="post">
    Filtrer par : <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>

<table>
    <tr>
        <th>Id Rendez Vous</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Etat</th>
        <th>Patient</th>
        <th>Médecin</th>
        <th>Action</th>
    </tr>
    <?php

    if (isset($lesRendezvous)) {
        foreach ($lesRendezvous as $unRendezvous) {
            /*if (strtolower($unRendezvous['etat']) == 'confirme') {
                echo "<tr style='background-color: green;'>";
            } elseif (strtolower($unRendezvous['etat']) == 'en attente') {
                echo "<tr style='background-color: yellow;'>";
            } elseif (strtolower($unRendezvous['etat']) == 'annule') {
                echo "<tr style='background-color: red;'>";
            } else {
                echo "<tr>";
            }*/

            echo "<td>" . $unRendezvous['idrendezvous'] . "</td>";
            echo "<td>" . $unRendezvous['daterdv'] . "</td>";
            echo "<td>" . $unRendezvous['heure'] . "</td>";
            echo "<td>" . $unRendezvous['etat'] . "</td>";
            echo "<td>" . $unRendezvous['patient_nom'] . " " . $unRendezvous['patient_prenom'] . "</td>";
            echo "<td>" . $unRendezvous['medecin_nom'] . " " . $unRendezvous['medecin_prenom'] . "</td>";

            echo "<td><a href='index.php?page=3&action=sup&idrendezvous=" . $unRendezvous['idrendezvous'] . "'>
                <img src='images/supprimer.png' height='20' width='20' alt='Supprimer'></a>";
            echo "<a href='index.php?page=3&action=edit&idrendezvous=" . $unRendezvous['idrendezvous'] . "'>
                <img src='images/editer.png' height='20' width='20' alt='Editer'></a></td>";
            echo "</tr>";
        }
    }
?>

</table>

</body>
</html>
