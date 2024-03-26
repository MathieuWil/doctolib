<style>
    h3 {
        text-align: center;
    }

    form {
        width: 450px;
        margin: 20px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    form input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    form input[type="submit"],
    form input[type="reset"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        background-color: #1599E3;
        color: #fff;
    }

    form input[type="submit"]:hover,
    form input[type="reset"]:hover {
        background-color: #2876E2;
    }
</style>

<br><br><br>

<h3>Gestion des patients</h3>

<form method="post" action="#">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" value="<?= ($unPatient != null) ? $unPatient['nom'] : '' ?>" required>

    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" value="<?= ($unPatient != null) ? $unPatient['prenom'] : '' ?>" required>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse" value="<?= ($unPatient != null) ? $unPatient['adresse'] : '' ?>" required>

    <label for="ville">Ville</label>
    <input type="text" name="ville" id="ville" value="<?= ($unPatient != null) ? $unPatient['ville'] : '' ?>" required>

    <label for="telephone">Téléphone</label>
    <input type="text" name="telephone" id="telephone" value="<?= ($unPatient != null) ? $unPatient['telephone'] : '' ?>" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= ($unPatient != null) ? $unPatient['email'] : '' ?>" required>

    <label for="dateNaissance">Date de naissance</label>
    <input type="date" name="dateNaissance" id="dateNaissance" value="<?= ($unPatient != null) ? $unPatient['dateNaissance'] : '' ?>" required>

    <label for="codePostal">Code postal</label>
    <input type="text" name="codePostal" id="codePostal" value="<?= ($unPatient != null) ? $unPatient['codePostal'] : '' ?>" required>

    <label for="sexe">Sexe</label>
    <select name="sexe" id="sexe" required>
        <option value="Homme" <?= ($unPatient != null && $unPatient['sexe'] == 'Homme') ? 'selected' : '' ?>>Homme</option>
        <option value="Femme" <?= ($unPatient != null && $unPatient['sexe'] == 'Femme') ? 'selected' : '' ?>>Femme</option>
    </select>

    <label for="specialite">Médecin</label>
    <select name="specialite" id="specialite" required>
        <?php
        $lesMedecins = $unControleur->selectAllMedecins();
        foreach ($lesMedecins as $unMedecin) {
            echo '<option value="' . $unMedecin['idmedecin'] . '"';
            if ($unPatient != null && $unPatient['idmedecin'] == $unMedecin['idmedecin']) {
                echo 'selected';
            }
            echo '>' . $unMedecin['nom'] . ' ' . $unMedecin['prenom'] . '</option>';
        }
        ?>
    </select>

    </br>
    </br>

    <input type="reset" name="Annuler" value="Annuler">
    <input type="submit" <?= ($unPatient != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>

    <?= ($unPatient != null) ? '<input type="hidden" name="idpatient" value="' . $unPatient['idpatient'] . '">' : '' ?>
</form>

</body>
</html>
