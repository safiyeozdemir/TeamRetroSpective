<?php

namespace App\Service;

use App\Repository\RetroUserRepository;
use Doctrine\ORM\EntityManagerInterface;

class RetroUserService
{
    /**
     * @var RetroUserRepository
     */
    private $retroUserRepository;

    public function __construct(RetroUserRepository $retroUserRepository)
    {
        $this->retroUserRepository = $retroUserRepository;
    }

    public function find($retroId = null)
    {
        return $this->retroUserRepository->find($retroId);
    }

    public function findUserRetro($userId = null)
    {
        return $this->retroUserRepository->findBy(['user' => $userId]);
    }

}