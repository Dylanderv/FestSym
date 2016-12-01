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
     * @var string
     *
     * @ORM\Column(name="IdSoiree", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idsoiree;

    /**
     * @var string
     *
     * @ORM\Column(name="IdLieu", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idlieu;



    /**
     * Set idsoiree
     *
     * @param string $idsoiree
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
     * @return string
     */
    public function getIdsoiree()
    {
        return $this->idsoiree;
    }

    /**
     * Set idlieu
     *
     * @param string $idlieu
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
     * @return string
     */
    public function getIdlieu()
    {
        return $this->idlieu;
    }
}
