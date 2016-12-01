<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="Offre")
 * @ORM\Entity
 */
class Offre
{
    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="Prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdProfessionnel", type="integer", nullable=true)
     */
    private $idprofessionnel;

    /**
     * @var string
     *
     * @ORM\Column(name="IdOffre", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoffre;



    /**
     * Set type
     *
     * @param string $type
     *
     * @return Offre
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Offre
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set idprofessionnel
     *
     * @param integer $idprofessionnel
     *
     * @return Offre
     */
    public function setIdprofessionnel($idprofessionnel)
    {
        $this->idprofessionnel = $idprofessionnel;

        return $this;
    }

    /**
     * Get idprofessionnel
     *
     * @return integer
     */
    public function getIdprofessionnel()
    {
        return $this->idprofessionnel;
    }

    /**
     * Get idoffre
     *
     * @return string
     */
    public function getIdoffre()
    {
        return $this->idoffre;
    }
}
