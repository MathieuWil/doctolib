<?php

class Modele {
    private $unPDO;

    public function __construct (){
        try {
            // connexion à la base de données maria
            $dsn = "mysql:host=localhost:3307;dbname=rdv_medecin;charset=utf8";
            $username = "root";
            $password = "";

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $this->unPDO = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $exp) {
            echo "Erreur Connexion :" . $exp->getMessage();
        }
    }
        
    /***********  Connexion  ***********/
        public function verifConnexion ($email, $mdp){
            $requete = "SELECT * FROM personne WHERE email = :email AND mdp = :mdp ;";
            $donnees = array(":email"=>$email, ":mdp"=>$mdp);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch();
        }

        /***********  Patient  ***********/
        public function insertPatient ($tab){
            // écriture de la requete preparée d'insertion d'un patient
            $requete = "INSERT INTO Patient (nom, prenom, adresse, ville, telephone, email, dateNaissance, codePostal, sexe, idmedecin) 
            VALUES (:nom, :prenom, :adresse, :ville, :telephone, :email, :dateNaissance, :codePostal, :sexe, :idmedecin);";
            /* creation d'un tableau de données de correspondance entre les paramètres PDO et les données reçues en entrée */
            $donnees = array(   ":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":adresse"=>$tab['adresse'],
                                ":ville"=>$tab['ville'],
                                ":telephone"=>$tab['telephone'],
                                ":email"=>$tab['email'],
                                ":dateNaissance"=>$tab['dateNaissance'],
                                ":codePostal"=>$tab['codePostal'],
                                ":sexe"=>$tab['sexe'],
                                ":idmedecin"=>$tab['idmedecin']
                            );

            // préparation de la requete
            $insert = $this->unPDO->prepare ($requete);

            // execution de la requete
            $insert->execute ($donnees);
        }

        // fonction qui récupère tout les patients
        public function selectAllPatients (){
            $requete ="SELECT * FROM patient;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        // fonction qui supprime un patient en fonction de l'id
        public function deletePatient ($idPatient){
            $requete="DELETE FROM patient WHERE idpatient = :idpatient ;";
            $donnees=array(":idpatient"=>$idPatient);
            $delete = $this->unPDO->prepare($requete);
            $delete->execute ($donnees);
        }

        // fonction qui permet de modifier les informations d'un patient
        public function updatePatient ($tab){
            $requete = "UPDATE patient SET nom=:nom, prenom=:prenom, adresse=:adresse, ville=:ville, telephone=:telephone, email=:email, dateNaissance=:dateNaissance, codePostal=:codePostal, sexe=:sexe, idmedecin=:idmedecin WHERE idpatient=:idpatient ;";
            $donnees = array(   ":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":adresse"=>$tab['adresse'],
                                ":ville"=>$tab['ville'],
                                ":telephone"=>$tab['telephone'],
                                ":email"=>$tab['email'],
                                ":dateNaissance"=>$tab['dateNaissance'],
                                ":codePostal"=>$tab['codePostal'],
                                ":sexe"=>$tab['sexe'],
                                ":idmedecin"=>$tab['idmedecin'],
                                ":idpatient"=>$tab['idpatient']
                            );
            $update = $this->unPDO->prepare($requete);
            $update->execute ($donnees);
        }

        public function selectWherePatient ($idPatient){
            $requete = "select * from patient where idpatient = :idpatient ;";
            $donnees=array(":idpatient"=>$idPatient);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch(); //un seul résultat
        }

        // fonction qui permet de filtrer la liste des patients
        public function selectLikePatients ($mot){
            $requete ="select * from patient where nom like :mot or prenom like :mot or adresse like :mot or ville like :mot or telephone like :mot or email like :mot or dateNaissance like :mot or codePostal like :mot or sexe like :mot or idmedecin like :mot ;";
            $donnees=array(":mot"=>"%".$mot."%");
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        }

        /***********  Medecin  ***********/
        public function insertMedecin ($tab){
            //écriture de la requete preparée d'insertion d'une medecin
            $requete = "INSERT INTO Medecin (nom, prenom, email, tel, specialite) VALUES (:nom, :prenom, :email, :tel, :specialite);";

            /* creation d'un tableau de données de correspondance entre 
               les paramètres PDO et kes données reçues en entrée */
            $donnees =array (   ":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":email"=>$tab['email'],
                                ":tel"=>$tab['tel'],
                                ":specialite"=>$tab['specialite']
                            );
            //préparation de la requete
            $insert = $this->unPDO->prepare ($requete);
            //execution de la requete
            $insert->execute ($donnees);
        }

        // fonction qui liste tout les médecins
        public function selectAllMedecins (){
            $requete ="select * from medecin; ";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        // fonction qui supprime un médecin en fonction de l'id
        public function deleteMedecin ($idMedecin){
            $requete="DELETE from medecin where idmedecin = :idmedecin ;";
            $donnees=array(":idmedecin"=>$idMedecin);
            $delete = $this->unPDO->prepare($requete);
            $delete->execute ($donnees);
        }

        // fonction qui permet la modification d'un médecin
        public function updateMedecin ($tab){
            $requete ="UPDATE medecin set nom = :nom, prenom = :prenom, email = :email, tel=:tel, specialite=:specialite where idmedecin = :idmedecin ;";
            $donnees = array(   ":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":email"=>$tab['email'],
                                ":tel"=>$tab['tel'],
                                ":specialite"=>$tab['specialite'],
                                ":idmedecin"=>$tab['idmedecin']
                            );
            $update = $this->unPDO->prepare($requete);
            $update->execute ($donnees);
        }

        public function selectWhereMedecin ($idMedecin){
            $requete = "select * from medecin where idmedecin = :idmedecin ;";
            $donnees=array(":idmedecin"=>$idMedecin);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch(); //un seul résultat 
        }

        // fonction qui permet de filtrer la liste des médecins
        public function selectLikeMedecins ($mot){
            $requete ="select * from medecin where nom like :mot or prenom like :mot or email like :mot or tel like :mot or specialite like :mot ;";
            $donnees=array(":mot"=>"%".$mot."%");
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        }

        /***********  Rendez-vous  ***********/
        public function insertRendezvous ($tab){
            //écriture de la requete preparée d'insertion d'une rendezvous
            $requete = "INSERT into rendezvous values (null, :daterdv, :heure, :etat, :idpatient, :idmedecin);";

            /* creation d'un tableau de données de correspondance entre 
               les paramètres PDO et les données reçues en entrée */
            $donnees =array (":daterdv"=>$tab['daterdv'],
                            ":heure"=>$tab['heure'],
                            ":etat"=>$tab['etat'],
                            ":idpatient"=>$tab['idpatient'],
                            ":idmedecin"=>$tab['idmedecin']);
            //préparation de la requete
            $insert = $this->unPDO->prepare ($requete);
            //execution de la requete
            $insert->execute ($donnees);
        }

        // fonction qui liste tout les rendez-vous
        public function selectAllRendezvous (){
            $requete = "SELECT r.idrendezvous, r.daterdv, r.heure, r.etat, p.nom AS patient_nom, p.prenom AS patient_prenom, m.nom AS medecin_nom, m.prenom AS medecin_prenom
            FROM rendezvous r
            JOIN patient p ON r.idpatient = p.idpatient
            JOIN medecin m ON r.idmedecin = m.idmedecin;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        // fonction qui supprime un rendez-vous en fonction de l'id
        public function deleteRendezvous ($idRendezvous){
            $requete="DELETE from rendezvous where idrendezvous = :idrendezvous ;";
            $donnees=array(":idrendezvous"=>$idRendezvous);
            $delete = $this->unPDO->prepare($requete);
            $delete->execute ($donnees);
        }

        // fonction qui permet d'éditer un rendez-vous
        public function updateRendezvous ($tab){
            $requete ="UPDATE rendezvous set daterdv = :daterdv, heure = :heure, etat = :etat, idpatient = :idpatient, idmedecin = :idmedecin where 
            idrendezvous = :idrendezvous ;";
            $donnees =array (":daterdv"=>$tab['daterdv'],
                            ":heure"=>$tab['heure'],
                            ":etat"=>$tab['etat'],
                            ":idpatient"=>$tab['idpatient'],
                            ":idmedecin"=>$tab['idmedecin'],
                            ":idrendezvous"=>$tab['idrendezvous']
                            );
            $update = $this->unPDO->prepare($requete);
            $update->execute ($donnees);
        }

        public function selectWhereRendezvous ($idRendezvous){
            $requete = "select * from rendezvous where idrendezvous = :idrendezvous ;";
            $donnees=array(":idrendezvous"=>$idRendezvous);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch(); //un seul résultat 
        }

        // fonction qui filtre les rendez-vous
        public function selectLikeRendezvous ($mot){
            $requete ="select * from rendezvous where date like :mot or heure like :mot or etat like :mot or idpatient like :mot or idmedecin like :mot ;";
            $donnees=array(":mot"=>"%".$mot."%");
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        }

        /***********  Prescription  ***********/
        public function insertPrescription ($tab){
            //écriture de la requete preparée d'insertion d'une prescription
            $requete = "INSERT into prescription values (null, :dateprescription, :medicament, :idpatient, :idmedecin);";

            /* creation d'un tableau de données de correspondance entre 
               les paramètres PDO et kes données reçues en entrée */
            $donnees =array (":dateprescription"=>$tab['dateprescription'],
                            ":medicament"=>$tab['medicament'],
                            ":idpatient"=>$tab['idpatient'],
                            ":idmedecin"=>$tab['idmedecin']
                        );
            //préparation de la requete
            $insert = $this->unPDO->prepare ($requete);
            //execution de la requete
            $insert->execute ($donnees);
        }

        // fonction qui liste toutes les prescriptions
        public function selectAllPrescriptions (){
            $requete ="select * from prescription; ";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        // fonction qui supprime une prescription
        public function deletePrescription ($idPrescription){
            $requete="delete from prescription where idprescription = :idprescription ;";
            $donnees=array(":idprescription"=>$idPrescription);
            $delete = $this->unPDO->prepare($requete);
            $delete->execute ($donnees);
        }

        // fonction pour modifier une prescription
        public function updatePrescription ($tab){
            $requete ="UPDATE prescription set dateprescription = :dateprescription, medicament = :medicament, idpatient = :idpatient, idmedecin = :idmedecin where 
            idprescription = :idprescription ;";
            $donnees =array (":dateprescription"=>$tab['dateprescription'],
                            ":medicament"=>$tab['medicament'],
                            ":idpatient"=>$tab['idpatient'],
                            ":idmedecin"=>$tab['idmedecin'],
                            ":idprescription"=>$tab['idprescription']
                            );
            $update = $this->unPDO->prepare($requete);
            $update->execute ($donnees);
        }

        public function selectWherePrescription ($idPrescription){
            $requete = "select * from prescription where idprescription = :idprescription ;";
            $donnees=array(":idprescription"=>$idPrescription);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch(); //un seul résultat 
        }

        // fonction qui filtre la liste des prescriptions
        public function selectLikePrescription ($mot){
            $requete ="select * from prescription where dateprescription like :mot or medicament like :mot or idpatient like :mot or idmedecin like :mot or idprescription like :mot;";
            $donnees=array(":mot"=>"%".$mot."%");
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        }



        /******************* Profession ********************/
        public function selectAllProfessions (){
            $requete ="select * from professions; ";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }
    }
