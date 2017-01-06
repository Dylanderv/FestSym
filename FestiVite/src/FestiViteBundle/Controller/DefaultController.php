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
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use FestiViteBundle\Repository\OffreRepository;
use FestiViteBundle\Entity\UtilisateurProfessionnel;
use FestiViteBundle\Entity\Offre;
use FestiViteBundle\Entity\SelectOffre;
use FestiViteBundle\Utils\RecherchePrestataire;
use Symfony\Component\HttpFoundation\Response;
use FestiViteBundle\Utils\CreationSoiree;




    class DefaultController extends Controller
    {
    public function mainAction()
    {
        return $this->render('FestiViteBundle:Default:main.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function creersoireeclassiqueAction(Request $request)
    {
      if($this->get('security.token_storage')->getToken()->getUser() != "anon."){
          $soiree = new CreationSoiree();
          $nom = $request->request->get('nom');
          $idOffre = '';
          if(isset($nom)){
            $soiree->setNom($request->request->get('nom'));
            $soiree->setAdresse($request->request->get('adresse'));
            $soiree->setDateDebut(new \DateTime($request->request->get('dateTime')));
            $soiree->setIdOffres($request->request->get('id'));
          }

          $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $soiree);
          $formBuilder
              ->add('nom', TextType::class)
              ->add('dateDebut', DateTimeType::class)
              ->add('adresse', TextType::class)
              ->add('idOffres', HiddenType::class)
              ->add('Suivant', SubmitType::class)
          ;
          $form = $formBuilder->getForm();

            return $this->render('FestiViteBundle:Default:creersoireeclassique.html.twig', array('idOffre' => $idOffre, 'request' => $request, 'form' => $form->createView(), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
        }
        return $this->render('FestiViteBundle:Default:main.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function creersoireeaventureAction()
    {
        return $this->render('FestiViteBundle:Default:creersoireeaventure.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function mesinfosAction()
    {
      if($this->get('security.token_storage')->getToken()->getUser() != "anon."){
        return $this->render('FestiViteBundle:Default:mesinfos.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
      }
      return $this->render('FestiViteBundle:Default:main.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function mesfetesAction()
    {
        if($this->get('security.token_storage')->getToken()->getUser() != "anon."){
            $usr = $this->get('security.token_storage')->getToken()->getUser();
            $em = $this->getDoctrine()->getManager();
            $requete = "SELECT A FROM FestiViteBundle\Entity\Soiree A WHERE A.adresseMail ='".$usr->getAdresseMail()."'";
            $query = $em->createQuery($requete);
            $soiree = $query->getResult();
            return $this->render('FestiViteBundle:Default:mesfetes.html.twig', array('soiree' => $soiree, 'user' => $usr));
        }
        return $this->render('FestiViteBundle:Default:main.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));

    }

    public function finaliserclassiqueAction(Request $request)
    {
        if($this->get('security.token_storage')->getToken()->getUser() != "anon."){

              $panier = '';
              //var_dump($request->request->get("id"));
              //$id = $request->request->get("id");

              $idOffre = explode("|", $request->request->get("id"));
              $prix = 0;
              if($idOffre != ''){
                $em = $this->getDoctrine()->getManager();
                foreach ($idOffre as $key => $value) {
                    if($idOffre[$key] != ''){
                        $requete = "SELECT A FROM FestiViteBundle\Entity\Offre A WHERE A.idoffre =".$value;
                        $query = $em->createQuery($requete);
                        $panier[] = $query->getResult();
                        $prix = $prix + $query->getResult()[0]->getPrix();
                    }

                }
              }

              $dateTime = $request->request->get('dateTime');
              $nom = $request->request->get('nom');
              $adresse = $request->request->get('adresse');
              $idOffres = $request->request->get('idOffres');


              return $this->render('FestiViteBundle:Default:finaliserclassique.html.twig', array('prix' => $prix, 'idOffres' => $idOffres, 'request' => $request, 'nom' => $nom, 'adresse' => $adresse, 'dateTime' => $dateTime, 'panier' => $panier, 'request' => $request, 'user' => $this->get('security.token_storage')->getToken()->getUser()));

        }
        return $this->render('FestiViteBundle:Default:main.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function finclassiqueAction(Request $request){

        if($this->get('security.token_storage')->getToken()->getUser() != "anon."){
            $soiree = new Soiree();
            $soiree->setNom($request->request->get('nom'));
            $soiree->setDateCreation(new \DateTime());
            $soiree->setDateSoiree(new \DateTime($request->request->get('dateTime')));
            $soiree->setAdresse($request->request->get('adresse'));
            $usr = $this->get('security.token_storage')->getToken()->getUser();
            $soiree->setAdresseMail($usr->getAdresseMail());
            $soiree->setPrix($request->request->get('prix'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($soiree);
            $em->flush();
            $idOffre = explode("|", $request->request->get("id"));
            if($idOffre != ''){
                if($idOffre[0] != ''){
                    foreach($idOffre as $key => $value){
                        $selectOffre = new SelectOffre();
                        $selectOffre->setQuantite(1);
                        $selectOffre->setIdsoiree($soiree->getIdSoiree());
                        $selectOffre->setIdoffre($value);
                        $em->persist($selectOffre);
                        $em->flush();
                    }
                }
            }


            return $this->render('FestiViteBundle:Default:finclassique.html.twig', array('user' => $usr));
        }
        return $this->render('FestiViteBundle:Default:main.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));


            }

    public function panierclassiqueAction(Request $request)
    {
        if($this->get('security.token_storage')->getToken()->getUser() != "anon."){
            $panier = '';
            //$id = $request->request->get("id");
            $idOffre = explode("|", $request->request->get("id"));
            $supp = $request->request->get("supp");
            if(isset($supp)){
              $offre = '';
              foreach ($idOffre as $key => $value) {
                if($key != $supp){
                  $offre[] = $value;
                }
              }
              if(isset($offre)){
                $idOffre = $offre;
              }

            }
            if($idOffre != ''){
                  $em = $this->getDoctrine()->getManager();
                  foreach ($idOffre as $key => $value) {
                      if($idOffre[$key] != ''){
                          $requete = "SELECT A FROM FestiViteBundle\Entity\Offre A WHERE A.idoffre =".$value;
                          $query = $em->createQuery($requete);
                          $panier[] = $query->getResult();
                      }

                  }
            }

            $dateTime = $request->request->get('dateTime');
            $nom = $request->request->get('nom');
            $adresse = $request->request->get('adresse');
            $idOffres = $request->request->get('idOffres');


            return $this->render('FestiViteBundle:Default:panierclassique.html.twig', array('request' => $request, 'idOffres' => $idOffres, 'nom' => $nom, 'adresse' => $adresse, 'dateTime' => $dateTime, 'panier' => $panier, 'user' => $this->get('security.token_storage')->getToken()->getUser()));
        }
        return $this->render('FestiViteBundle:Default:main.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));

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
            array('form' => $form->createView(), 'offre' => $recherche->getRecherche($this->getDoctrine()->getManager()), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
    }

    public function ajoutprestataireAction(Request $request)
    {
        if($this->get('security.token_storage')->getToken()->getUser() != "anon."){
            $panier = '';
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
            $id = $request->request->get("id");
            if(isset($id)){
                if($id != ''){
                    $panier = explode('|', $id);
                }
            }

            $postForm = $request->request->get('form');
            $postNom = $request->request->get('nom');
            $dateTime = '';
            $nom = '';
            $adresse = '';
            $idOffres = '';
            if(isset($postForm)){
              $dateTime = $postForm['dateDebut']['date']['year']."-".
                          $postForm['dateDebut']['date']['month']."-".
                          $postForm['dateDebut']['date']['day'].
                          " ".
                          $postForm['dateDebut']['time']['hour'].":".
                          $postForm['dateDebut']['time']['minute'];
             $nom = $postForm['nom'];
             $adresse = $postForm['adresse'];
             $idOffres = $postForm['idOffres'];
            }else if(isset($postNom)){
             $dateTime = $request->request->get('dateTime');
             $nom = $request->request->get('nom');
             $adresse = $request->request->get('adresse');
             $idOffres = $request->request->get('idOffres');
            }

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
                        array('idOffres' => $idOffres, 'nom' => $nom, 'adresse' => $adresse, 'dateTime' => $dateTime, 'panier' => $panier, 'form' => $form->createView(), 'offre' => $recherche->getRecherche($this->getDoctrine()->getManager()), 'user' => $this->get('security.token_storage')->getToken()->getUser()));
                }
            }
            return $this->render('FestiViteBundle:Default:ajoutprestataire.html.twig',
                array('request' => $request, 'idOffres' => $idOffres, 'request' => $request, 'nom' => $nom, 'adresse' => $adresse, 'dateTime' => $dateTime, 'panier' => $panier, 'form' => $form->createView(), 'user' => $this->get('security.token_storage')->getToken()->getUser(), 'offre' => $recherche->getRecherche($this->getDoctrine()->getManager())));
        }
        return $this->render('FestiViteBundle:Default:main.html.twig', array('user' => $this->get('security.token_storage')->getToken()->getUser()));

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

      if($usr->getRoles()[0] == "ROLE_PREST"){
        return $this->redirectToRoute('festi_vite_prestataire');
      } else if ($usr->getRoles()[0] == "ROLE_USER"){
        return $this->redirectToRoute('festi_vite_main');
      }
      return $this->render('FestiViteBundle:Default:testRedirect.html.twig', array("user" => $usr));
    }


}
