<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\User;
use App\Entity\Retro;
use App\Service\BrainStormService;
use Doctrine\ORM\EntityManagerInterface;
//use http\Env\Request;
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
     * @Route("/home", name="home")
     */
    public function index(BrainStormService $brainStormService)
    {

        $comments = $brainStormService->findAll(1);

        //return new Response(json_encode($comments));
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'data' => $comments,
        ]);
    }

    /**
     * @return Response
     * @Route ("/home/comment", name="comment")
     */
    public function addComment(Request $request, EntityManagerInterface $entityManager)
    {

        //return new Response(json_encode($request->get('commentType')));

        $this->entityManager = $entityManager;



        $comment = new Comment();
        $comment->setCommentType($request->get('commentType'));
        //$comment->setCommentType(3);
        $comment->setRetro($request->get(2));
        $comment->setCommentUser($request->get(2));

        $comment->setCommentText($request->get('comment'));
        $comment->setCreatedAt(new \DateTime());




        $this->entityManager->persist($comment);
        $this->entityManager->flush();

        return new Response($request->get('comment'));


    }
}
