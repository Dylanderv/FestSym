<?php

namespace FestiViteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FestiViteBundle\Entity\Utilisateur;

class DefaultController extends Controller
{
    public function mainAction()
    {
        return $this->render('FestiViteBundle:Default:main.html.twig');
    }

    public function creersoireeAction()
    {
        return $this->render('FestiViteBundle:Default:creersoiree.html.twig');
    }

    public function moncompteAction()
    {
        return $this->render('FestiViteBundle:Default:moncompte.html.twig');
    }

    public function accueilAction()
    {
        return $this->render('FestiViteBundle:Default:pagedaccueil.html.twig');
    }

    public function rechercheAction()
    {
        return $this->render('FestiViteBundle:Default:recherche.html.twig');
    }

    public function testAction()
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setNom("Dylan");
        $utilisateur->setPrenom("aaa");
        $utilisateur->setAdresseMail("adresseMail");
        $utilisateur->setMotDePasse("545");
        $utilisateur->setDateNaissance(new \DateTime("now"));
        $utilisateur->setAdresse("AAA");
        var_dump($utilisateur);
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($utilisateur);
        $doctrine->flush();

        return $this->render('FestiViteBundle:Default:testDylan.html.twig');
    }
}
