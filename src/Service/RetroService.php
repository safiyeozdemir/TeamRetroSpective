<?php

namespace App\Service;

use App\Repository\RetroRepository;
use Doctrine\ORM\EntityManagerInterface;

class RetroService
{
    /**
     * @var RetroRepository
     */
    private $retroRepository;

    public function __construct(RetroRepository $retroRepository)
    {
        $this->retroRepository = $retroRepository;
    }

    public function find($retroId = null)
    {
        return $this->retroRepository->find($retroId);
    }

    public function findUserRetro($userId = null)
    {
        return $this->retroRepository->findBy(['user' => $userId]);
    }
}