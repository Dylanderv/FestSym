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
     * @var string
     *
     * @ORM\Column(name="Prix", type="decimal", precision=9, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdProfessionnel", type="integer", nullable=true)
     */
    private $idprofessionnel;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdOffre", type="integer")
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
     * @param string $prix
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
     * @return string
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
     * Set image
     *
     * @param string $image
     *
     * @return Offre
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
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
     * @return integer
     */
    public function getIdoffre()
    {
        return $this->idoffre;
    }
}
