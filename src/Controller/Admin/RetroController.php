<?php

namespace App\Controller\Admin;

use App\Entity\Retro;
use App\Form\RetroType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RetroController extends AbstractController
{
    /**
     * @Route("/admin/retro", name="admin/retro")
     */
    public function index()
    {
        $retro = new Retro();
        $retroForm = $this->createForm(RetroType::class, $retro);

        return $this->render('admin/retro/index.html.twig',[
            'form' => $retroForm->createView(),
        ]);
    }

    /**
     * @Route("/admin/retro/create", name="retro_create")
     */
    public function create(EntityManagerInterface $entityManager, Request $request) : Response
    {
        $this->entityManager = $entityManager;
        $entityManager =$this->getDoctrine()->getManager();
        $retro = new Retro();

        $retroForm = $this->createForm(RetroType::class, $retro);
        $retroForm->handleRequest($request);

        if($retroForm->isSubmitted() && $retroForm->isValid() )
        {
            $alpha_numeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $url_hash = substr( str_shuffle($alpha_numeric),0,20);

            $retro ->setRetroLink($url_hash);

            $entityManager->persist($retro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin/user', array('retroLink' => $retro->getRetroLink()));
    }
}