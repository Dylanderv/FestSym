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
     * @ORM\Column(name="TarifHoraire", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $tarifhoraire;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix_Initial", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $prixInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=8192, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="IdLieu", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlieu;



    /**
     * Set tarifhoraire
     *
     * @param string $tarifhoraire
     *
     * @return Lieu
     */
    public function setTarifhoraire($tarifhoraire)
    {
        $this->tarifhoraire = $tarifhoraire;

        return $this;
    }

    /**
     * Get tarifhoraire
     *
     * @return string
     */
    public function getTarifhoraire()
    {
        return $this->tarifhoraire;
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
     * Get idlieu
     *
     * @return string
     */
    public function getIdlieu()
    {
        return $this->idlieu;
    }
}
