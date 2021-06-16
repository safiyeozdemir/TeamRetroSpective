<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Comment;
use App\Repository\CommentRepository;
use Doctrine\DBAL\Driver\Connection;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;


    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    public function find($userId = null)
    {
       return $this->userRepository->find($userId);
    }
}