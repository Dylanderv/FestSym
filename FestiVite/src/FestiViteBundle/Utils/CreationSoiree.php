<?php

namespace FestiViteBundle\Utils;

class CreationSoiree
{
  private $dateDebut;
  private $nom;
  private $idOffres;
  private $adresse;

  public function getDateDebut(){
      return $this->dateDebut;
  }
  public function getNom(){
      return $this->nom;
  }
  public function getIdOffres(){
      return $this->idOffres;
  }
  public function getAdresse(){
      return $this->adresse;
  }

  public function setDateDebut($dateDebut){
      $this->dateDebut = $dateDebut;
  }
  public function setNom($nom){
      $this->nom = $nom;
  }
  public function setIdOffres($idOffres){
      $this->idOffres = $idOffres;
  }
  public function setAdresse($adresse){
      $this->adresse = $adresse;
  }
}


?>
