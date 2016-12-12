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
     * @var integer
     *
     * @ORM\Column(name="Quantite", type="integer", nullable=false)
     */
    private $quantite;

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
     * @ORM\Column(name="IdOffre", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idoffre;



    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return SelectOffre
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set idsoiree
     *
     * @param integer $idsoiree
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
     * @return integer
     */
    public function getIdsoiree()
    {
        return $this->idsoiree;
    }

    /**
     * Set idoffre
     *
     * @param integer $idoffre
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
     * @return integer
     */
    public function getIdoffre()
    {
        return $this->idoffre;
    }
}
