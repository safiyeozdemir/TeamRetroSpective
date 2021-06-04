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
    private $userid;

    /**
     * @ORM\ManyToOne(targetEntity="Retro")
     * @ORM\JoinColumn(nullable=false)
     */
    private $retroid;

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
    public function getUserId(){
        return $this->userid;
    }
    public function setUserId($userid):void{
        $this->userid=$userid;
    }
    public function getRetroId(){
        return $this->retroid;
    }
    public function setRetroId($retroid):void{
        $this->retroid=$retroid;
    }






}
