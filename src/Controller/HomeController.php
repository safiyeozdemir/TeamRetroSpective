<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Service\BrainStormService;
use App\Service\UserService;
use App\Service\RetroService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    /**
     * @var EntityManagerInterface
     */
    private $entityManager;


    /**
     * @Route("/home", name="homepage")
     */


    public function index(BrainStormService $brainStormService)
    {

        $comments = $brainStormService->findAll(2);

        //return new Response(json_encode($comments));
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'data' => $comments,
        ]);
    }

    /**
     * @return Response
     * @Route ("/home/comment", name="home_comment")
     */

    public function addComment(Request $request, RetroService $retroService, UserService  $userService, EntityManagerInterface $entityManager)
    {

        $user = $userService->find(3);
        $retro = $retroService->find(73);

        $this->entityManager = $entityManager;

        $comment = new Comment();
        $comment->setCommentType($request->get('commentType'));
        $comment->setRetro($retro);
        $comment->setCommentUser($user);
        $comment->setCommentText($request->get('comment'));
        $comment->setCreatedAt(new \DateTime());

        $this->entityManager->persist($comment);
        $this->entityManager->flush();

        return new Response(json_encode(['commentId' => $comment->getId(), 'comment' => $comment->getCommentText()]));
    }

}
