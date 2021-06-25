<?php

namespace App\Controller;

use App\Entity\Retro;
use App\Form\RetroType;
use App\Service\RetroService;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RetroController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var RetroService
     */
    private $retroService;

    /**
     * @var UserService
     */
    private $userService;

    public function __construct(EntityManagerInterface $entityManager,
                                RetroService $retroService,
                                UserService $userService

    )
    {
        $this->entityManager = $entityManager;
        $this->retroService = $retroService;
        $this->userService = $userService;
    }


    /**
     * @Route("/retro", name="retro")
     */
    public function index()
    {
        $data = $this->retroService->findUserRetro(56);

        return $this->render('retro/list.html.twig',[
            'data' => $data
        ]);
    }

    /**
     * @Route("/retro/create", name="retro_create")
     */
    public function create(Request $request) : Response
    {
        $retro = new Retro();

        $retroForm = $this->createForm(RetroType::class, $retro);
        $retroForm->handleRequest($request);

        if($retroForm->isSubmitted() && $retroForm->isValid() )
        {
            $user = $this->userService->find(56);

            $alpha_numeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $url_hash = substr( str_shuffle($alpha_numeric),0,20);

            $retro->setRetroLink($url_hash);
            $retro->setUser($user);
            $retro->setCereatedAt(new \DateTime());
            $retro->setIsFinished(0);

            $this->entityManager->persist($retro);
            $this->entityManager->flush();
        }
        else
        {
            return $this->render('retro/create.html.twig',[
                'form' => $retroForm->createView(),
            ]);
        }

        return $this->redirectToRoute('retro');
    }
}