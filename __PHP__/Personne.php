<?php

/**
 * @author Papa Magueye GUEYE - MagueyeTech
 * @email magueyetech@gmail.com
 * @create date 02/07/2020 22:54:12
 * @modify date 02/07/2020 22:54:12
 * @desc [description]
 */

include 'DBConfig.php';

class Personne
{
    private $IdP;
    private $Nom;
    private $Prenom;
    private $Email;
    private $Tel;
    private $Datenaissance;

    public function __construct($data = [])
    {
        if (count($data) > 0) {
            $this->IdP = isset($data['IdP']) ? $data['IdP'] : "";
            $this->Nom = isset($data['Nom']) ? $data['Nom'] : "";
            $this->Prenom = isset($data['Prenom']) ? $data['Prenom'] : "";
            $this->Email = isset($data['Email']) ? $data['Email'] : "";
            $this->Tel = isset($data['Tel']) ? $data['Tel'] : "";
            $this->Datenaissance = isset($data['Datenaissance']) ? $data['Datenaissance'] : "";
        }
    }

    //  GETTERS

    public function getIdP()
    {
        return $this->IdP;
    }
    public function getNom()
    {
        return $this->Nom;
    }
    public function getPrenom()
    {
        return $this->Prenom;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function getTel()
    {
        return $this->Tel;
    }
    public function getDatenaissance()
    {
        return $this->Datenaissance;
    }

    // SETTERSS

    public function setIdP($IdP)
    {
        return $this->Id = $IdP;
    }
    public function setNom($Nom)
    {
        return $this->Nom = $Nom;
    }
    public function setPrenom($Prenom)
    {
        return $this->Prenom = $Prenom;
    }
    public function setEmail($Email)
    {
        return $this->Email = $Email;
    }
    public function setTel($Tel)
    {
        return $this->Tel = $Tel;
    }
    public function setDatenaissance($Datenaissance)
    {
        return $this->Datenaissance = $Datenaissance;
    }


    // CRUD

    public function findAll()
    {
        $personnes = [];
        $SQL = "SELECT * FROM personnes";
        $rows = DBConnection::getQuery($SQL);
        foreach ($rows as $row) {
            array_push($personnes, $row);
        }
        return $personnes;
    }

    public function get()
    {
        $SQL = "SELECT * FROM personnes WHERE IdP=" . $this->IdP;
        $personne = DBConnection::getQuery($SQL)->fetch();
        return $personne;
    }

    public function save()
    {
        $SQL = "INSERT INTO personnes (Nom, Prenom, Email, Tel, Datenaissance)";
        $SQL .= " VALUES (";

        $SQL .= "'" . $this->getNom() . "', ";
        $SQL .= "'" . $this->getPrenom() . "', ";
        $SQL .= "'" . $this->getEmail() . "', ";
        $SQL .= "'" . $this->getTel() . "', ";
        $SQL .= "'" . $this->getDatenaissance() . "'";

        $SQL .= ")";

        $inserted = DBConnection::runQuery($SQL);
        return $inserted > 0;
    }

    public function update()
    {
        $SQL = "UPDATE personnes SET ";

        $SQL .= "Nom='" . $this->getNom() . "', ";
        $SQL .= "Prenom='" . $this->getPrenom() . "', ";
        $SQL .= "Email='" . $this->getEmail() . "', ";
        $SQL .= "Tel='" . $this->getTel() . "', ";
        $SQL .= "Datenaissance='" . $this->getDatenaissance() . "' ";

        $SQL .= "WHERE IdP=" . $this->getIdP();

        $updated = DBConnection::runQuery($SQL);
        return $updated > 0;
    }


    public function delete()
    {
        $SQL = "DELETE FROM personnes WHERE IdP=" . $this->IdP;
        $count = DBConnection::runQuery($SQL);
        return $count > 0;
    }
}
