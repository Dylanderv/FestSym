<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SelectLieu
 *
 * @ORM\Table(name="Select_Lieu")
 * @ORM\Entity
 */
class SelectLieu
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Duree", type="time", nullable=false)
     */
    private $duree;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdSoiree", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idsoiree;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdLieu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idlieu;



    /**
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return SelectLieu
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set idsoiree
     *
     * @param integer $idsoiree
     *
     * @return SelectLieu
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

    /**
     * Set idlieu
     *
     * @param integer $idlieu
     *
     * @return SelectLieu
     */
    public function setIdlieu($idlieu)
    {
        $this->idlieu = $idlieu;

        return $this;
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
