<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Retro;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/admin/user/{retroLink}", name="admin/user")
     */
    public function index($retroLink = null)
    {
        $user = new User();

        $userForm = $this->createForm(UserType::class, $user);

        return $this->render('admin/user/index.html.twig',[
            'form' => $userForm->createView(),
        ]);
    }

    /**
     * @Route("/admin/user/create", name="user_create")
     */
    public function create(EntityManagerInterface $entityManager, Request $request) : Response
    {
        $this->entityManager = $entityManager;
        $entityManager =$this->getDoctrine()->getManager();
        $user = new User();

        $userForm = $this->createForm(UserType::class, $user);
        $userForm->handleRequest($request);

        if($userForm->isSubmitted() && $userForm->isValid() )
        {
            $alpha_numeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $url_hash = substr( str_shuffle($alpha_numeric),0,20);

            $user->setUserLink($url_hash);

            $entityManager->persist($user);
            $entityManager->flush();


        }
    }
}