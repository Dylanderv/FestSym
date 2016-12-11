<?php

namespace FestiViteBundle\Utils;

class RecherchePrestataire
{
  private $motcle = null;
  private $tri = "Nouveauté";
  private $disponibilite = null;
  private $type = null;

  function getMotCle(){
    return $this->motcle;
  }

  function getTri(){
    return $this->tri;
  }

  function getDisponibilite(){
    return $this->disponibilite;
  }

  function getType(){
    return $this->type;
  }

  function setMotCle($motCle){
    $this->motCle = $motCle;
  }

  function setTri($tri){
    $this->tri = $tri;
  }

  function setDisponibilite($disponibilite){
    $this->disponibilite = $disponibilite
  }

  function setType($type){
    $this->type = $type;
  }


}


?>
