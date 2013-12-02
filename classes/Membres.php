<?php
include("../model/connexionBdd.php");
include("../model/inscription/requeteInscription.php");

class Membres {
    
    private $_id;
private $_nom;
private $_prenom;
private $_mail;
private $_mdp;
private $_dateNaiss;
private $_sexe;
    
    
function __construct($mail,$nom,$prenom,$mdp,$dateNaiss,$sexe)
{
    $this->_mail=$mail;  
    $this->_nom=$nom;
    $this->_prenom=$prenom;
    $this->_mdp=$mdp;
    $this->_dateNaiss=$dateNaiss;
    $this->_sexe=$sexe;
}

function getId($mail,$bdd)
{
 $id=selectId($mail,$bdd);

    return $id;
    
}
function getNom()
{
    return  $this->_nom;
}

function getPrenom()
{
    return  $this->_prenom;
}

function getMail()
{
    return  $this->_mail;
}
function getDateNaiss()
{
    return  $this->_dateNaiss;
}
function getSexe()
{
    return  $this->_sexe;
}


function ajouterMembre($bdd)
{
    $mail=$this->_mail;  
   $nom= $this->_nom;
    $prenom=$this->_prenom;
   $mdp= $this->_mdp;
    $dateNaiss=$this->_dateNaiss;
    $sexe=$this->_sexe;
    
    inscription($prenom,$nom,$mdp,$mail,$dateNaiss,$sexe,$bdd);
}



function suppMembre()
{
    
}


function modifMembre()
{
    
}
    
}
