<?php

namespace App\Entity;

use App\Repository\RetroUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RetroUserRepository::class)
 */
class RetroUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="retroUsers")
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $step;

    /**
     * @ORM\ManyToOne(targetEntity=Retro::class, inversedBy="retroUsers")
     */
    private $retro;



    public function getId(): ?int
    {
        return $this->id;
    }



    public function getUser(): ?User
    {
        return $this->userID;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStep(): ?int
    {
        return $this->step;
    }

    public function setStep(?int $step): self
    {
        $this->step = $step;

        return $this;
    }

    public function getRetro(): ?Retro
    {
        return $this->retro;
    }

    public function setRetro(?Retro $retro): self
    {
        $this->retro = $retro;

        return $this;
    }


}
