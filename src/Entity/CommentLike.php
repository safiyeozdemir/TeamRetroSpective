<?php

namespace App\Entity;

use App\Repository\CommentLikeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentLikeRepository::class)
 */
class CommentLike
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commentLikes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $likeUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLikeUser(): ?User
    {
        return $this->likeUser;
    }

    public function setLikeUser(?User $likeUser): self
    {
        $this->likeUser = $likeUser;

        return $this;
    }
}
