<?php

namespace App\Service;

use App\Entity\BrainStorm;
use Doctrine\DBAL\Driver\Connection;
use App\Repository\BrainStormRepository;

class BrainStormService
{
    private $brainStromRepository;

    public function __construct(BrainStormRepository $brainStromRepository)
    {
        $this->brainStromRepository = $brainStromRepository;
    }

    public function findAll($retroID = null)
    {

        $data = $this->brainStromRepository->findAll($retroID);

        return $data;
    }

    public function addComment()
    {


    }


}