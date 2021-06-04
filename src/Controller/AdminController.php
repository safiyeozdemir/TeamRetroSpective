<?php

namespace App\Controller;

use App\Entity\Retro;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(EntityManagerInterface $entityManager)
    {
        //Create a retro
        $retro = new Retro();
        $retro->setRetroLink('https://google.com');
        $retro->setRetroName('Team RetroSpective Project');
        $entityManager->persist($retro);

        $entityManager->flush();

        return new Response("Userlar için link olusturuldu {$retro->getRetroLink()} toplantının adı {$retro->getRetroName()} olarak ayarlandı");

    }
}
