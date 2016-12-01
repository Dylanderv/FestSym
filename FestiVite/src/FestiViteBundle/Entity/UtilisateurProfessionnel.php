<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UtilisateurProfessionnel
 *
 * @ORM\Table(name="Utilisateur_professionnel")
 * @ORM\Entity
 */
class UtilisateurProfessionnel
{
    /**
     * @var string
     *
     * @ORM\Column(name="Mot_de_passe", type="string", length=255, nullable=false)
     */
    private $motDePasse;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="Numero_de_telephone", type="string", length=14, nullable=true)
     */
    private $numeroDeTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Societe", type="string", length=255, nullable=false)
     */
    private $nomSociete;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Creation", type="date", nullable=false)
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_mail", type="string", length=255, nullable=false)
     */
    private $adresseMail;

    /**
     * @var string
     *
     * @ORM\Column(name="IdProfessionnel", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprofessionnel;



    /**
     * Set motDePasse
     *
     * @param string $motDePasse
     *
     * @return UtilisateurProfessionnel
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get motDePasse
     *
     * @return string
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return UtilisateurProfessionnel
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
     * Set numeroDeTelephone
     *
     * @param string $numeroDeTelephone
     *
     * @return UtilisateurProfessionnel
     */
    public function setNumeroDeTelephone($numeroDeTelephone)
    {
        $this->numeroDeTelephone = $numeroDeTelephone;

        return $this;
    }

    /**
     * Get numeroDeTelephone
     *
     * @return string
     */
    public function getNumeroDeTelephone()
    {
        return $this->numeroDeTelephone;
    }

    /**
     * Set nomSociete
     *
     * @param string $nomSociete
     *
     * @return UtilisateurProfessionnel
     */
    public function setNomSociete($nomSociete)
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    /**
     * Get nomSociete
     *
     * @return string
     */
    public function getNomSociete()
    {
        return $this->nomSociete;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return UtilisateurProfessionnel
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
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return UtilisateurProfessionnel
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
     * Get idprofessionnel
     *
     * @return string
     */
    public function getIdprofessionnel()
    {
        return $this->idprofessionnel;
    }
}
