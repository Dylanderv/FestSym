<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieu
 *
 * @ORM\Table(name="Lieu")
 * @ORM\Entity
 */
class Lieu
{
    /**
     * @var string
     *
     * @ORM\Column(name="Tarif", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix_Initial", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $prixInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=1000, nullable=true)
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
     * @ORM\Column(name="IdLieu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlieu;



    /**
     * Set tarif
     *
     * @param string $tarif
     *
     * @return Lieu
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return string
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set prixInitial
     *
     * @param string $prixInitial
     *
     * @return Lieu
     */
    public function setPrixInitial($prixInitial)
    {
        $this->prixInitial = $prixInitial;

        return $this;
    }

    /**
     * Get prixInitial
     *
     * @return string
     */
    public function getPrixInitial()
    {
        return $this->prixInitial;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Lieu
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
     * @return Lieu
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
     * Get idlieu
     *
     * @return integer
     */
    public function getIdlieu()
    {
        return $this->idlieu;
    }
}
