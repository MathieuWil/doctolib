<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des médecins</title>
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

<h3>Liste des médecins</h3>

<form method="post">
    Filtrer par : <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>

<table>
    <tr>
        <th>Id Médecin</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Spécialité</th>
    </tr>
    <?php
    if (isset($lesMedecins)) {
        foreach ($lesMedecins as $unMedecin) {
            echo "<tr>";
            echo "<td>" . $unMedecin['idmedecin'] . "</td>";
            echo "<td>" . $unMedecin['nom'] . "</td>";
            echo "<td>" . $unMedecin['prenom'] . "</td>";
            echo "<td>" . $unMedecin['email'] . "</td>";
            echo "<td>" . $unMedecin['tel'] . "</td>";
            echo "<td>" . $unMedecin['specialite'] . "</td>";

            echo "<td><a href='index.php?page=2&action=sup&idmedecin=" . $unMedecin['idmedecin'] . "'>
                  <img src='images/supprimer.png' height='20' width='20' alt='Supprimer'></a>";
            echo "<a href='index.php?page=2&action=edit&idmedecin=" . $unMedecin['idmedecin'] . "'>
                  <img src='images/editer.png' height='20' width='20' alt='Editer'></a></td>";
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>
