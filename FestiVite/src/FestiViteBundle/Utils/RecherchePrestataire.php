<?php

namespace FestiViteBundle\Utils;

class RecherchePrestataire
{
  private $motcle = ' ';
  private $tri = 'dateAjout desc';
  private $disponibilite = '';
  private $type = '';

  function getMotcle(){
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

  function setMotcle($motcle){
    $this->motcle = $motcle;
  }

  function setTri($tri){
    $this->tri = $tri;
  }

  function setDisponibilite($disponibilite){
    $this->disponibilite = $disponibilite;
  }

  function setType($type){
    $this->type = $type;
  }

  function getRecherche($em){
      $expl = explode(' ', $this->motcle);
      $request = "SELECT A FROM FestiViteBundle\Entity\Offre A WHERE";
      foreach($expl as $key => $value) {
          if($key == 0){
              $request = $request." A.description LIKE '%".$value."%'";
          }else{
              $request = $request." AND A.description LIKE '%".$value."%'";
          }
      }

      if($this->tri != 'pertinence'){
          $request = $request.' ORDER BY A.'.$this->tri;
      }
      var_dump($request);

      $query = $em->createQuery($request);
      return $query->getResult();
  }


}


?>
