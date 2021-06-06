<?php

namespace App\Controller;

use App\Entity\Retro;
use App\Form\RetroType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function show(Environment $twig,EntityManagerInterface $entityManager,Request $request){
        $retro = new Retro();
        $form = $this->createForm(RetroType::class, $retro);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($retro);
            $entityManager->flush();

            return new Response("Userlar için link olusturuldu {$retro->getRetroLink()}
             toplantının adı {$retro->getRetroName()} ve takımın adı {$retro->getTeamName()} olarak ayarlandı");

        }
        return new Response($twig->render('admin/index.html.twig',[
            'retro_form'=>$form->createView()
        ]));
    }


    /*
    #[Route('/admin', name: 'admin')]
    public function index(EntityManagerInterface $entityManager)
    {
        //Create a retro
        $retro = new Retro();
        //$retro->setRetroLink('https://google.com');
        $retro->setRetroName();
        //$entityManager->persist($retro);

        //$entityManager->flush();

       // return new Response("Userlar için link olusturuldu {$retro->getRetroLink()} toplantının adı {$retro->getRetroName()} olarak ayarlandı");
         return $this->render('admin/index.html.twig');
    }
    */

}
