<?php

namespace FestiViteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FestiViteBundle::squelette.html.twig');
    }
}
