<?php
require_once("model/model.class.php");

class Controleur
{
    private $unModel;

    public function __construct()
    {
        //instanciation de la classe Modele
        $this->unModel = new Modele();
    }

    /******************* Connexion ********************/
    public function verifConnexion($email, $mdp) {
        $unPersonne = $this->unModel->verifConnexion($email, $mdp);
        return $unPersonne;
    }

    /******************* Patient ********************/
    public function insertPatient($tab) {
        //on appelle la méthode du Modele
        $this->unModel->insertPatient($tab);
    }

    public function selectAllPatients()
    {
        $lesPatients = $this->unModel->selectAllPatients();
        return $lesPatients;
    }

    public function selectLikePatients($mot)
    {
        $lesPatients = $this->unModel->selectLikePatients($mot);
        return $lesPatients;
    }

    public function deletePatient($idPatient)
    {
        $this->unModel->deletePatient($idPatient);
    }

    public function updatePatient($tab)
    {
        $this->unModel->updatePatient($tab);
    }

    public function selectWherePatient($idPatient)
    {
        return $this->unModel->selectWherePatient($idPatient);
    }

    /******************* Medecin ********************/
    public function insertMedecin($tab)
    {
        //on appelle la méthode du Modele
        $this->unModel->insertMedecin($tab);
    }
    public function selectAllMedecins()
    {
        $lesMedecins = $this->unModel->selectAllMedecins();
        return $lesMedecins;
    }

    public function selectLikeMedecins($mot) {
        $lesMedecins = $this->unModel->selectLikeMedecins($mot);
        return $lesMedecins;
    }

    public function deleteMedecin($idMedecin)
    {
        $this->unModel->deleteMedecin($idMedecin);
    }

    public function updateMedecin($tab)
    {
        $this->unModel->updateMedecin($tab);
    }

    public function selectWhereMedecin($idMedecin)
    {
        return $this->unModel->selectWhereMedecin($idMedecin);
    }

    /******************* Rendezvous ********************/
    public function insertRendezvous($tab)
    {
        //on appelle la méthode du Modele
        $this->unModel->insertRendezvous($tab);
    }
    public function selectAllRendezvous()
    {
        $lesRendezvous = $this->unModel->selectAllRendezvous();
        return $lesRendezvous;
    }

    public function selectLikeRendezvous($mot)
    {
        $lesRendezvous = $this->unModel->selectLikeRendezvous($mot);
        return $lesRendezvous;
    }

    public function deleteRendezvous($idRendezvous)
    {
        $this->unModel->deleteRendezvous($idRendezvous);
    }

    public function updateRendezvous($tab)
    {
        $this->unModel->updateRendezvous($tab);
    }

    public function selectWhereRendezvous($idRendezvous)
    {
        return $this->unModel->selectWhereRendezvous($idRendezvous);
    }

    /******************* Prescription ********************/
    public function insertPrescription($tab)
    {
        //on appelle la méthode du Modele
        $this->unModel->insertPrescription($tab);
    }
    public function selectAllPrescriptions()
    {
        $lesPrescriptions = $this->unModel->selectAllPrescriptions();
        return $lesPrescriptions;
    }

    public function selectLikePrescription($mot)
    {
        $lesPrescriptions = $this->unModel->selectLikePrescription($mot);
        return $lesPrescriptions;
    }

    public function deletePrescription($idPrescription)
    {
        $this->unModel->deletePrescription($idPrescription);
    }

    public function updatePrescription($tab)
    {
        $this->unModel->updatePrescription($tab);
    }

    public function selectWherePrescription($idPrescription)
    {
        return $this->unModel->selectWherePrescription($idPrescription);
    }



    /******************* Profession ********************/
    public function selectAllProfessions() {
        $lesProfessions = $this->unModel->selectAllProfessions();
        return $lesProfessions;
    }    
}
