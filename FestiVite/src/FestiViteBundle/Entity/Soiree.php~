<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soiree
 *
 * @ORM\Table(name="Soiree")
 * @ORM\Entity
 */
class Soiree
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix", type="decimal", precision=9, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Creation", type="date", nullable=false)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Soiree", type="date", nullable=false)
     */
    private $dateSoiree;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix_Pers", type="decimal", precision=9, scale=0, nullable=true)
     */
    private $prixPers;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_mail", type="string", length=255, nullable=true)
     */
    private $adresseMail;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdSoiree", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsoiree;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Soiree
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Soiree
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Soiree
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
     * Set type
     *
     * @param string $type
     *
     * @return Soiree
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
     * Set description
     *
     * @param string $description
     *
     * @return Soiree
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Soiree
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateSoiree
     *
     * @param \DateTime $dateSoiree
     *
     * @return Soiree
     */
    public function setDateSoiree($dateSoiree)
    {
        $this->dateSoiree = $dateSoiree;

        return $this;
    }

    /**
     * Get dateSoiree
     *
     * @return \DateTime
     */
    public function getDateSoiree()
    {
        return $this->dateSoiree;
    }

    /**
     * Set prixPers
     *
     * @param string $prixPers
     *
     * @return Soiree
     */
    public function setPrixPers($prixPers)
    {
        $this->prixPers = $prixPers;

        return $this;
    }

    /**
     * Get prixPers
     *
     * @return string
     */
    public function getPrixPers()
    {
        return $this->prixPers;
    }

    /**
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return Soiree
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
     * Get idsoiree
     *
     * @return integer
     */
    public function getIdsoiree()
    {
        return $this->idsoiree;
    }
}
