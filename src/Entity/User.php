<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $user_name;

    /**
     * @ORM\OneToMany(targetEntity="BrainStorm", mappedBy="userid")
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="userid")
     * @ORM\OneToMany(targetEntity="CommentLike", mappedBy="userid")
     * @ORM\OneToMany(targetEntity="Discuss", mappedBy="userid")
     */
    private $userbrainstorm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;

        return $this;
    }
}
