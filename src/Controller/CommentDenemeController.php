<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\CommentLike;
Use App\Repository\CommentRepository;
use App\Service\RetroService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class CommentDenemeController extends AbstractController
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
     * @return Response
     * @Route ("/comment/create", name="comment_create")
     */
    public function addComment(Request $request, RetroService $retroService)
    {
        $retro = $retroService->findRetroLink($this->get('session')->get('meeting'));

        $comment = new Comment();
        $comment->setCommentType($request->get('commentType'));
        $comment->setRetro($retro);
        $comment->setCommentUser($this->security->getUser());
        $comment->setCommentText($request->get('comment'));
        $comment->setCreatedAt(new \DateTime());

        $this->entityManager->persist($comment);
        $this->entityManager->flush();

        return new Response(json_encode(['commentId' => $comment->getId(), 'comment' => $comment->getCommentText()]));
    }


    /**
     * @return Response
     * @Route ("/comment/like", name="comment_like")
     */
    public function like(Request $request, CommentRepository $commentRepository):Response
    {
        $comment = $commentRepository->find($request->get('comment'));

        $commentLike = new CommentLike();
        $commentLike->setComment($comment);
        $commentLike->setLikeUser($this->security->getUser());

        $this->entityManager->persist($commentLike);
        $this->entityManager->flush();

        return new Response(json_encode(['comment'=>$commentLike->getComment()]));
    }

    /**
     * @return Response
     * @Route ("/comment/vote/control", name="comment_vote_control")
     */
    public function voteControl(RetroService $retroService, CommentRepository $commentRepository):Response
    {
        $retro = $retroService->findRetroLink($this->get('session')->get('meeting'));

        $comments = $commentRepository->findBy(['retro' => $retro->getId(),
                                                'commentUser' => $this->security->getUser()]);

        $output = array();
        $happyControl = false;
        $lessControl = false;
        $nextControl = false;


        foreach ($comments as $comment)
        {
            if($comment->getCommentType() == 1)
            {
                $happyControl = true;
                continue;
            }

            if($comment->getCommentType() == 2)
            {
                $lessControl = true;
                continue;
            }

            if($comment->getCommentType() == 3)
            {
                $nextControl = true;
                continue;
            }




            $output[] = array($comment->getCommentText(), $comment->getCommentType());
        }

        if(!$happyControl || !$lessControl || !$nextControl)
        {
            $this->addFlash('error', 'Vote Aşamasına Geçebilmeniz için Bütün Alanlar için En az Bir yorumda bulunmanız gerekmektedir.');
        //    return "null";
        }
        else
        {
            //Tüm Alanlara Yorumda Bulunmuş İse Vote kısmına yönlendirme yapacağım.
        }

        return new Response(null);
        //return new Response(json_encode($output));

    }
}

