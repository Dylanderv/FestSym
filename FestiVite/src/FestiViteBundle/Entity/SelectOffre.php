<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SelectOffre
 *
 * @ORM\Table(name="Select_Offre")
 * @ORM\Entity
 */
class SelectOffre
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
     * @ORM\Column(name="IdOffre", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idoffre;



    /**
     * Set idsoiree
     *
     * @param string $idsoiree
     *
     * @return SelectOffre
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
     * Set idoffre
     *
     * @param string $idoffre
     *
     * @return SelectOffre
     */
    public function setIdoffre($idoffre)
    {
        $this->idoffre = $idoffre;

        return $this;
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
