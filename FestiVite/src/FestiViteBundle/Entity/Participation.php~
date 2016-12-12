<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="Participation")
 * @ORM\Entity
 */
class Participation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Nb_Personnes", type="integer", nullable=false)
     */
    private $nbPersonnes;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_mail", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $adresseMail;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdSoiree", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idsoiree;



    /**
     * Set nbPersonnes
     *
     * @param integer $nbPersonnes
     *
     * @return Participation
     */
    public function setNbPersonnes($nbPersonnes)
    {
        $this->nbPersonnes = $nbPersonnes;

        return $this;
    }

    /**
     * Get nbPersonnes
     *
     * @return integer
     */
    public function getNbPersonnes()
    {
        return $this->nbPersonnes;
    }

    /**
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return Participation
     */
    public function setAdresseMail($adresseMail)
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    /**
     * Get adresseMail
     *
     * @return string
     */
    public function getAdresseMail()
    {
        return $this->adresseMail;
    }

    /**
     * Set idsoiree
     *
     * @param integer $idsoiree
     *
     * @return Participation
     */
    public function setIdsoiree($idsoiree)
    {
        $this->idsoiree = $idsoiree;

        return $this;
    }

    /**
     * Get idsoiree
     *
     * @return integer
     */
    public function getIdsoiree()
    {
        return $this->idsoiree;
    }
}
