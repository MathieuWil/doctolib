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

<h3> Gestion des médecins </h3>
<form method="post">
    Nom Medecin </br>
    <input type="text" name="nom" value="<?= ($unMedecin != null) ? $unMedecin['nom'] : '' ?>"> </br>
    Prénom Medecin </br>
    <input type="text" name="prenom" value="<?= ($unMedecin != null) ? $unMedecin['prenom'] : '' ?>"> </br>
    Email Medecin </br>
    <input type="text" name="email" value="<?= ($unMedecin != null) ? $unMedecin['email'] : '' ?>"> </br>
    Téléphone Medecin </br>
    <input type="text" name="tel" value="<?= ($unMedecin != null) ? $unMedecin['tel'] : '' ?>"> </br>
    
    <!--Récupération des professions dans la DB-->
    <label for="specialite">Profession</label>
    <select name="specialite" id="specialite" required>
        <?php
        $lesProfessions = $unControleur->selectAllProfessions();
        foreach ($lesProfessions as $uneProfession) {
            echo '<option value="' . $uneProfession['idprofession'] . '">' . $uneProfession['libelle'] . '</option>';
            
        }
        ?>
    </select>


    <br />


    </select>
    <br />

    <input type="reset" name="Annuler" value="Annuler">
    <input type="submit" <?= ($unMedecin != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>

    <?= ($unMedecin != null) ? '<input type="hidden" name="idmedecin" value="' . $unMedecin['idmedecin'] . '">' : '' ?>
</form>