<?php

namespace App\Controller;


use App\Entity\Retro;
use App\Service\BrainStormService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var Security
     */
    private $security;



    public function __construct(EntityManagerInterface $entityManager,
                                Security $security
    )
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }


    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('index.html.twig', [
        ]);
    }

    /**
     * @param $link
     * @return Response
     * @Route ("/meeting/{link}", name="home_link")
     */
    public function meeting($link, Request $request,BrainStormService $brainStormService):Response
    {
        $em = $this->getDoctrine()->getManager();

        $retroRepository = $em->getRepository(Retro::class);

        $retro_item = $retroRepository->findOneBy([
            'retroLink'=>$link
        ]);



        if($retro_item )
        {
            date_default_timezone_set('Europe/Istanbul');

            $currentDate = new \DateTime;

            $startDate = new \DateTime($retro_item->getStartDate()->format("Y-m-d H:i:s"));
            $endDate = new \DateTime($retro_item->getEndDate()->format("Y-m-d H:i:s"));

            if(($currentDate >= $startDate) && ($currentDate <= $endDate))
            {
                $this->get('session')->set('meeting', $retro_item->getRetroLink());

                $comments = $brainStormService->findAll($retro_item->getId());

                return $this->render('home/index.html.twig', [
                    'controller_name' => 'HomeController',
                    'data' => $comments
                ]);
            }
            else
            {
                return new Response('Katılmak istediğiniz RetroSpective toplantısının başlangı ve bitiş tarihleri arasında değilsiniz!');
            }
        }
        else
        {
            return new Response('Yanlış link');
        }
    }

}
