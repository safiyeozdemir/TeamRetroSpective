<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\RegisterType;
use App\Form\LoginType;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var UserPasswordHasherInterface
     */
    private $hasher;

    /**
     * @var UserService
     */
    private $userService;

    public function __construct(EntityManagerInterface $entityManager,
                                UserPasswordHasherInterface $hasher,
                                UserService $userService
                                )
    {
        $this->entityManager = $entityManager;
        $this->hasher = $hasher;
        $this->userService = $userService;
    }

    /**
     * @Route("/account/register", name="account_register")
     */
    public function register(Request $request) : Response
    {
        $user = new User();

        $userForm = $this->createForm(RegisterType::class, $user);
        $userForm->handleRequest($request);



        if($userForm->isSubmitted() && $userForm->isValid() )
        {
            $password = $this->hasher->hashPassword($user, $user->getPassword());

            $user->setPassword($password);
            $user->setRoles(['ROLE_USER']);
            $user->setCreatedAt(new \DateTime());

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->addFlash('success', 'Kullanıcı Başarıyla Oluşturuldu! Teşekkürler');

            return $this->redirectToRoute('register');
        }

        return $this->render('register.html.twig',[
            'form' => $userForm->createView(),
        ]);
    }

}