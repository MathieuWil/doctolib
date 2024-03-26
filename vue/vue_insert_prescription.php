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

<h3> Gestion des prescriptions </h3>
<form method="post">
	Date de Prescription </br>
	<input type="date" name="dateprescription" value="<?= ($unPrescription != null) ? $unPrescription['dateprescription'] : '' ?>"> </br>
	Medicament </br>
	<input type="text" name="medicament" value="<?= ($unPrescription != null) ? $unPrescription['medicament'] : '' ?>"> </br>


	Le Patient : <br />
	<select name="idpatient" value="<?= ($unRendezvous != null) ? $unRendezvous['idpatient'] : '' ?>">
		<?php
		foreach ($lesPatients as $unPatient) {
			echo "<option value='" . $unPatient['idpatient'] . "'>";
			echo $unPatient['prenom'];
			echo "</option>";
		}
		?>
	</select><br />



	Le Médecin : <br />
	<select name="idmedecin" value="<?= ($unRendezvous != null) ? $unRendezvous['idmedecin'] : '' ?>">
		<?php
		foreach ($lesMedecins as $unMedecin) {
			echo "<option value='" . $unMedecin['idmedecin'] . "'>";
			echo $unMedecin['prenom'];
			echo "</option>";
		}
		?>
	</select>
	<br />
	<br />

	<input type="reset" name="Annuler" value="Annuler">
	<input type="submit" <?= ($unPrescription != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>

	<?= ($unPrescription != null) ? '<input type="hidden" name="idprescription" value="' . $unPrescription['idprescription'] . '">' : '' ?>
</form>