<?php

namespace FestiViteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FestiViteBundle\Entity\Utilisateur;
use FestiViteBundle\Entity\Soiree;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



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
        return $this->render('FestiViteBundle:Default:rechercheprestataire.html.twig');
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

    public function createsoireeAction(Request $request){
        $soiree = new Soiree();
        $soiree->setDateCreation(new \DateTime());
        $soiree->setDateSoiree(new \DateTime());
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $soiree);
        $formBuilder
            ->add('dateSoiree', DateType::class)
            ->add('nom', TextType::class)
            ->add('adresse', TextType::class)
            ->add('prix', MoneyType::class)
            ->add('type', ChoiceType::class, array('choices'  => array('Aventure' => "Aventure",'Classique' => "Classique")))
            ->add('valider', SubmitType::class)
        ;
        $form = $formBuilder->getForm();
        //LAISSEZ LES COMMENTAIRES BANDE DE CHIBRES MOUS
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $advert dans la base de données, par exemple
                $em = $this->getDoctrine()->getManager();
                $em->persist($soiree);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Soirée bien enrengistrée');
                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('festi_vite_main');
            }
        }
        return $this->render('FestiViteBundle:Default:testCreationSoiree.html.twig',
             array('form' => $form->createView()));
    }

    public function connectionAction(){
    $authenticationUtils = $this->get('security.authentication_utils');

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('FestiViteBundle:Default:testConnection.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

}
