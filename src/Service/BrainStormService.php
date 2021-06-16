<?php

namespace App\Service;

use App\Entity\BrainStorm;
use App\Entity\Comment;
use App\Repository\CommentRepository;
use Doctrine\DBAL\Driver\Connection;
use App\Repository\BrainStormRepository;
use Doctrine\ORM\EntityManagerInterface;

class BrainStormService
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;


    public function __construct(CommentRepository $commentRepository, EntityManagerInterface $entityManager)
    {
        $this->commentRepository = $commentRepository;
        $this->entityManager = $entityManager;
    }

    public function findAll($retroID = null)
    {

        $data = $this->commentRepository->findBy(['retro' => $retroID],['id' => 'DESC']);

        return $data;
    }




}