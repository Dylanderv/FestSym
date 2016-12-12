<?php
namespace FestiViteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OffreRepository extends EntityRepository
{
  public function getOffreWithUtilProf()
  {
    $qb = $this->createQueryBuilder('a');

      return $qb->getQuery()->getResult();



  }




}






 ?>
