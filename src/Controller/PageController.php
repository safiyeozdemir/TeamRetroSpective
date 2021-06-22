<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Form\LoginType;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('index.html.twig',[

        ]);
    }

    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        $user = new User();
        $userForm = $this->createForm(RegisterType::class, $user);

        return $this->render('register.html.twig',[
            'form' => $userForm->createView(),
        ]);
    }

}