<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invite
 *
 * @ORM\Table(name="Invite")
 * @ORM\Entity
 */
class Invite
{
    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_mail", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $adresseMail;

    /**
     * @var string
     *
     * @ORM\Column(name="IdSoiree", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idsoiree;



    /**
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return Invite
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
     * @param string $idsoiree
     *
     * @return Invite
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
}
