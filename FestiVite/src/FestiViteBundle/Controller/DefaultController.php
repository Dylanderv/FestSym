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
        return $this->render('FestiViteBundle:Default:accueil.html.twig');
    }

    public function rechercheAction()
    {
        return $this->render('FestiViteBundle:Default:recherche.html.twig');
    }

    public function testAction()
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setNom("Dylan");
        $utilisateur->setPrenom("Dylan");
        $utilisateur->setDatenaissance("05/11/1996");
        //$utilisateur->setAdresseMail("Dylan@aaa.fr");

        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($utilisateur);
        $doctrine->flush();


        return $this->render('FestiViteBundle:Default:testDylan.html.twig', array('doctrine' => $doctrine));
    }
}
