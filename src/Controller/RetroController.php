<?php

namespace App\Controller;

use App\Entity\Retro;
use App\Entity\User;
use App\Form\RetroType;
use App\Service\RetroService;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

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

    /**
     * @var Security
     */
    private $security;

    public function __construct(EntityManagerInterface $entityManager,
                                RetroService $retroService,
                                UserService $userService,
                                Security $security
    )
    {
        $this->entityManager = $entityManager;
        $this->retroService = $retroService;
        $this->userService = $userService;
        $this->security = $security;
    }

    /**
     * @Route("/retro", name="retro")
     */
    public function index()
    {
        $data = $this->retroService->findUserRetro($this->security->getUser()->getId());

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
            $alpha_numeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $url_hash = substr( str_shuffle($alpha_numeric),0,10);

            $retro->setRetroLink($url_hash);
            $retro->setUser($this->security->getUser());
            $retro->setCereatedAt(new \DateTime());
            $retro->setIsFinished(0);
            $retro->setStep(0);

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