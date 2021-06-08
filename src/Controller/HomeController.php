<?php

namespace App\Controller;

use App\Entity\BrainStorm;
use App\Form\BrainStormFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function show(Environment $twig){
        $brainstorm = new BrainStorm();
        $form = $this->createForm(BrainStormFormType::class,$brainstorm);
        return new Response($twig->render('home/index.html.twig',[
            'brain_form'=> $form->createView()

            ]));
    }


    /*
  #[Route('/home', name: 'home')]

  public function index(): Response
  {
      return $this->render('home/index.html.twig', [
          'controller_name' => 'HomeController',
      ]);
  }
  */
}
