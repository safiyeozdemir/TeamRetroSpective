<?php

namespace App\Entity;

use App\Repository\BrainStormRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity(repositoryClass=BrainStormRepository::class)
 */
class BrainStorm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_happy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_less;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_next;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Retro")
     * @ORM\JoinColumn(nullable=false)
     */
    private $retro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserHappy(): ?string
    {
        return $this->user_happy;
    }

    public function setUserHappy(string $user_happy): self
    {
        $this->user_happy = $user_happy;

        return $this;
    }

    public function getUserLess(): ?string
    {
        return $this->user_less;
    }

    public function setUserLess(string $user_less): self
    {
        $this->user_less = $user_less;

        return $this;
    }

    public function getUserNext(): ?string
    {
        return $this->user_next;
    }

    public function setUserNext(string $user_next): self
    {
        $this->user_next = $user_next;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getRetro()
    {
        return $this->retro;
    }

    /**
     * @param mixed $retro
     */
    public function setRetro($retro): void
    {
        $this->retro = $retro;
    }
}
