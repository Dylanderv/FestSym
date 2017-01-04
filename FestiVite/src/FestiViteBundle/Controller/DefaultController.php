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
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use FestiViteBundle\Repository\OffreRepository;
use FestiViteBundle\Entity\UtilisateurProfessionnel;
use FestiViteBundle\Entity\Offre;
use FestiViteBundle\Utils\RecherchePrestataire;
use Symfony\Component\HttpFoundation\Response;




    class DefaultController extends Controller
    {
    public function mainAction()
    {
        return $this->render('FestiViteBundle:Default:main.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function creersoireeclassiqueAction()
    {
        return $this->render('FestiViteBundle:Default:creersoireeclassique.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function creersoireeaventureAction()
    {
        return $this->render('FestiViteBundle:Default:creersoireeaventure.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function moncompteAction()
    {
        return $this->render('FestiViteBundle:Default:moncompte.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function rechercheAction(Request $request)
    {
        $recherche = new RecherchePrestataire();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $recherche);
        $formBuilder
            ->add('motcle', TextType::class, array('required' => false))
            ->add('tri',ChoiceType::class,
            array('choices' => array(
                    'Nouveauté' => 'dateAjout desc',
                    'Prix Croissant' => 'prix',
                    'Prix Decroissant' => 'prix desc'),
            'choices_as_values' => true,'multiple'=>false,'expanded'=>true))

            ->add('disponibilite', ChoiceType::class,
                array('choices' => array(
                    '- Disponibilite -' => '',
                    'Default' => '',
                    'Lundi' => 'Lundi',
                    'Mardi' => 'Mardi',
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi',
                    'Samedi' => 'Samedi',
                    'Dimanche' => 'Dimanche')))

            ->add('type', ChoiceType::class,
                array('choices' => array(
                    '- Type -' => '',
                    'Default' => '')))

            ->add('Rechercher', SubmitType::class)
        ;
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $advert dans la base de données, par exemple

                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->render('FestiViteBundle:Default:rechercheprestataire.html.twig',
                    array('form' => $form->createView(), 'offre' => $recherche->getRecherche($this->getDoctrine()->getManager()), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
            }
        }


        return $this->render('FestiViteBundle:Default:rechercheprestataire.html.twig',
            array('form' => $form->createView(), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function ajoutprestataireAction(Request $request)
    {
        $recherche = new RecherchePrestataire();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $recherche);
        $formBuilder
            ->add('motcle', TextType::class, array('required' => false))
            ->add('tri',ChoiceType::class,
            array('choices' => array(
                    'Nouveauté' => 'dateAjout desc',
                    'Prix Croissant' => 'prix',
                    'Prix Decroissant' => 'prix desc'),
            'choices_as_values' => true,'multiple'=>false,'expanded'=>true))

            ->add('disponibilite', ChoiceType::class,
                array('choices' => array(
                    '- Disponibilite -' => '',
                    'Default' => '',
                    'Lundi' => 'Lundi',
                    'Mardi' => 'Mardi',
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi',
                    'Samedi' => 'Samedi',
                    'Dimanche' => 'Dimanche')))

            ->add('type', ChoiceType::class,
                array('choices' => array(
                    '- Type -' => '',
                    'Default' => '')))

            ->add('Rechercher', SubmitType::class)
        ;
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $advert dans la base de données, par exemple

                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->render('FestiViteBundle:Default:ajoutprestataire.html.twig',
                    array('form' => $form->createView(), 'offre' => $recherche->getRecherche($this->getDoctrine()->getManager()), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
            }
        }
        return $this->render('FestiViteBundle:Default:ajoutprestataire.html.twig',
            array('form' => $form->createView(), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function testAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('FestiViteBundle:UtilisateurProfessionnel');
        $utils = $repository->findAll();
        /*
        $repository->findBy(
        array $critere,
        array $orderBy,
        $limit,
        $offset
        )
        */
        //$utils = $repository->createQueryBuilder('a')->getQuery()->getResult();
        //$repository2 = $this->getDoctrine()->getManager()->getRepository('FestiViteBundle:UtilisateurProfessionnel');
        //$repository2->createQueryBuilder('prof');



/*

        $utils = $repository
          ->createQueryBuilder('a')
          ->leftJoin('a.offres', 'prof')
          ->addSelect('prof')
          ->getQuery()
          ->getResult();*/
        //var_dump($utils);

          /*$uti = new UtilisateurProfessionnel();
          $uti->setMotDePasse("123456789");
          $uti->setAdresse("3 rue des pommiers");
          $uti->setNumeroDeTelephone("041424258475");
          $uti->setNomSociete("Entreprise 1");
          $uti->setDateCreation(new \DateTime("now"));
          $uti->setAdresseMail("aaa@entreprise1.fr");
          $em = $this->getDoctrine()->getManager();
          $em->persist($uti);
          $em->flush();*/

          $uti = new Offre();
          $uti->setType("TypeA");
          $uti->setPrix("123456789");
          $uti->setDescription("Avion du chocolat sans fraises");
          $uti->setImage("Entreprise 3");

          $utils = $repository->findAll();
          $utils[0]->addOffre($uti);
          //var_dump($utils[0]->getOffres());
          $em = $this->getDoctrine()->getManager();
          $em->persist($uti);
          $em->flush();

        /*$repositoryUtil = $this->getDoctrine()->getManager()->getRepository('FestiViteBundle:UtilisateurProfessionnel');
        $repositoryOffre = $this->getDoctrine()->getManager()->getRepository('FestiViteBundle:Offre');
        $utils = $repositoryUtil->findAll();
        $offre = $repositoryOffre->findAll();*/
        //$utils = $utils[0]->getUtilisateurProfessionnel();
        /*s $utils[0]->addOffre($uti);
        //var_dump($utils[0]->getOffres());
        $em = $this->getDoctrine()->getManager();
        $em->persist($uti);
        $em->flush();*/
        /*$utils = $repository->findAll();
        var_dump($utils[0]);
        $aaa = $utils[0]->getOffres();
        var_dump($aaa);*/
        //$utils = OffreRepository::getOffreWithUtilProf();
        /*var_dump($uti);
        var_dump($utils[0]);*/
        return $this->render('FestiViteBundle:Default:testDylan.html.twig', array("utils" => $utils, 'user' => $this->get('security.token_storage')->getToken()->getUser()));
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
             array('form' => $form->createView(), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function prestataireAction(Request $request){
        $usr = $this->get('security.token_storage')->getToken()->getUser();
        if($usr !=  'anon.' && $usr->getRoles()[0] == "ROLE_PREST"){
            $offre = new Offre();
            $offre->setDateAjout(new \DateTime());
            $usr->addOffre($offre);
            $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $offre);

            $formBuilder
                ->add('Type', TextType::class)
                ->add('prix', MoneyType::class)
                ->add('description', TextType::class)
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
                    $em->persist($offre);
                    $em->flush();
                    $request->getSession()->getFlashBag()->add('notice', 'Offre bien enrengistrée');
                    // On redirige vers la page de visualisation de l'annonce nouvellement créée
                    return $this->redirectToRoute('festi_vite_prestataire',
                        array('form' => $form->createView(), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
                }
            }
            return $this->render('FestiViteBundle:Default:prestataire.html.twig',
                 array('form' => $form->createView(), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
        }else{
            return new Response(
            "<html><body>Vous n'avez pas accès à cette page</body></html>"
        );
        }


    }

    public function redirectAction(){
      $usr = $this->get('security.token_storage')->getToken()->getUser();
      var_dump($usr->getRoles());
      if($usr->getRoles()[0] == "ROLE_PREST"){
        return $this->redirectToRoute('festi_vite_prestataire');
      } else if ($usr->getRoles()[0] == "ROLE_USER"){
        return $this->redirectToRoute('festi_vite_main');
      }
      return $this->render('FestiViteBundle:Default:testRedirect.html.twig', array("user" => $usr));
    }


}
