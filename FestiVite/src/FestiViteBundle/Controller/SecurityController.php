<?php
// src/FestiViteBundle/Controller/SecurityController.php;

namespace FestiViteBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FestiViteBundle\Entity\Utilisateur;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SecurityController extends Controller{
    public function loginAction(Request $request){
        //CONNEXION
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('festi_vite_main');
        }

        //INSCRIPTION
        // Le service authentication_utils permet de récupérer le nom d'utilisateur
        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
        // (mauvais mot de passe par exemple)
        $authenticationUtils = $this->get('security.authentication_utils');
        $newCompte = new Utilisateur();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $newCompte);
        $newCompte->setRoles('ROLE_USER');
        $formBuilder
            ->add('adresseMail', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('dateNaissance', BirthdayType::class)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('valider', SubmitType::class)
        ;

        $form = $formBuilder->getForm();

        // Si la requête est en POST
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);
            var_dump($newCompte->getPassword());
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $advert dans la base de données, par exemple
                $em = $this->getDoctrine()->getManager();
                $em->persist($newCompte);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur est bien enrengistré');
                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->render('FestiViteBundle:Default:pagedaccueil.html.twig', array(
                    'last_username' => $authenticationUtils->getLastUsername(),
                    'error'         => $authenticationUtils->getLastAuthenticationError(),
                    'form'          => $form->createView(),
                    'enreg'         => "Vous êtes bien enregistré, veuillez vous connecter.",
                    'user' => $this->get('security.token_storage')->getToken()->getUser()
                  ));
            }
        }

        return $this->render('FestiViteBundle:Default:pagedaccueil.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
            'form'          => $form->createView(),
            'user' => $this->get('security.token_storage')->getToken()->getUser()
          ));
    }
}
