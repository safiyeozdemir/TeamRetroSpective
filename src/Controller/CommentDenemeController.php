<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Service\RetroService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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

}

