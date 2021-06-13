<?php

namespace App\Controller;

use App\Entity\BrainStorm;
use App\Form\BrainStormFormType;
use App\Form\HappyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\BrainStormService;
use Twig\Environment;

class HomeController extends AbstractController
{

    #[Route('/home', name: 'home')]
    public function index(BrainStormService $brainStormService)
    {

        $brainstorms = $brainStormService->findAll(1);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'data' => $brainstorms
        ]);
        //return new Response(json_encode($brainstorms));


    }

}
