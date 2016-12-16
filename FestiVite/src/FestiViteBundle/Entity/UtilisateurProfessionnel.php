<?php

namespace FestiViteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * UtilisateurProfessionnel
 *
 * @ORM\Table(name="Utilisateur_professionnel")
 * @ORM\Entity
 */
class UtilisateurProfessionnel implements UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

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
     * @var integer
     *
     * @ORM\Column(name="idprofessionnel", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprofessionnel;

    /**
     * @var string
     *
     * @ORM\Column(name="Roles", type="string", length=255, nullable=true)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
    *
    *@ORM\OneToMany(targetEntity="FestiViteBundle\Entity\Offre", mappedBy="utilisateurprofessionnel")
    *
    */
    private $offres;

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
     * @return integer
     */
    public function getIdprofessionnel()
    {
        return $this->idprofessionnel;
    }


    public function addOffre(Offre $offre)
    {
    $this->offres[] = $offre;
    // On lie l'annonce à la candidature
    $offre->setUtilisateurProfessionnel($this);
    return $this;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->offres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Remove offre
     *
     * @param \FestiViteBundle\Entity\Offre $offre
     */
    public function removeOffre(\FestiViteBundle\Entity\Offre $offre)
    {
        $this->offres->removeElement($offre);
    }

    /**
     * Get offres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOffres()
    {
        return $this->offres;
    }


    /**
    * Set roles
    *
    * @param string $roles
    *
    * @return UtilisateurProfessionnel
    */
   public function setRoles($roles)
   {
       $this->roles = $roles;

       return $this;
   }

   /**
    * Get roles
    *
    * @return array
    */
   public function getRoles()
   {
       $decoupe = explode('|',$this->roles);
       foreach ($decoupe as $key => $value) {
         $value = trim($value);
       }
       return $decoupe;
   }

   /**
    * Set salt
    *
    * @param string $salt
    *
    * @return UtilisateurProfessionnel
    */
   public function setSalt($salt)
   {
       $this->salt = $salt;

       return $this;
   }

   /**
    * Get salt
    *
    * @return string
    */
   public function getSalt()
   {
       return $this->salt;
   }

   public function eraseCredentials(){

   }

   /**
    * Set password
    *
    * @param string $password
    *
    * @return UtilisateurProfessionnel
    */
   public function setPassword($password)
   {
       $this->password = $password;

       return $this;
   }

   /**
    * Get password
    *
    * @return string
    */
   public function getPassword()
   {
       return $this->password;
   }

   public function getUsername(){
     return $this->adresseMail;
   }

}
