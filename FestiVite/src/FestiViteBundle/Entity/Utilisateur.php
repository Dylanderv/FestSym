<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Utilisateur
 *
 * @ORM\Table(name="Utilisateur")
 * @ORM\Entity
 */
class Utilisateur implements UserInterface, \Serializable{
    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_mail", type="string", length=255, nullable=false)
     */
    private $adresseMail;

    /**
     * @var string
     *
     * @ORM\Column(name="Mot_de_passe", type="string", length=42, nullable=false)
     */
    private $motDePasse;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdUtilisateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idutilisateur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsActive", type="boolean")
     */
    private $isActive;


    /**
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return Utilisateur
     */
    public function setAdresseMail($adresseMail){
        $this->adresseMail = $adresseMail;
        return $this;
    }

    /**
     * Get adresseMail
     *
     * @return string
     */
    public function getAdresseMail(){
        return $this->adresseMail;
    }

    /**
     * Set motDePasse
     *
     * @param string $motDePasse
     *
     * @return Utilisateur
     */
    public function setMotDePasse($motDePasse){
        $this->motDePasse = $motDePasse;
        return $this;
    }

    /**
     * Get motPassword
     *
     * @return string
     */
    public function getPassword(){
        return $this->motDePasse;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom(){
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom){
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom(){
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Utilisateur
     */
    public function setDateNaissance($dateNaissance){
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance(){
        return $this->dateNaissance;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Utilisateur
     */
    public function setAdresse($adresse){
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse(){
        return $this->adresse;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername(){
        return $this->adresse;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getRoles(){
        return array('ROLE_USER');
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt(){
        return null;
    }

    /**
     * Erase credentials
     *
     * @return Utilisateur
     */
    public function eraseCredentials(){
        $this->Mot_de_passe;
        return this;
    }

    /**
     * Get idutilisateur
     *
     * @return integer
     */
    public function getIdutilisateur(){
        return $this->idutilisateur;
    }

    /**
     * Serialize
     *
     * @return serialize
     */
    public function serialize(){
        return serialize(array(
            $this->idutilisateur,
            $this->adresseMail,
            $this->Mot_de_passe,
            //$this->salt
        ));
    }

    /**
     * Unserialize
     *
     * @return Utilisateur
     */
    public function unserialize($serialized){
        list (
            $this->idutilisateur,
            $this->adresseMail,
            $this->Mot_de_passe,
            // $this->salt
        ) = unserialize($serialized);
        return this;
    }
}
