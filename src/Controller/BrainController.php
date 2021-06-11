<?php

namespace App\Controller;

use App\Entity\BrainStorm;
use App\Form\BrainStormFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class BrainController extends AbstractController
{
    /*
    #[Route('/brain', name: 'brain')]
    public function index(): Response
    {
        return $this->render('brain/index.html.twig', [
            'controller_name' => 'BrainController',
        ]);
    }
    */
    #[Route('/show')]
    public function show(Environment $twig)
    {
        $brain = new BrainStorm();

        $form = $this->createForm(BrainStormFormType::class,$brain);

        return new Response($twig->render('home/index.html.twig',[
            'brain_form' => $form->createView()
        ]));
    }

}
