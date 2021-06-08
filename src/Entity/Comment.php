<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $comment_type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

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

    /**
     * @ORM\OneToMany(targetEntity="CommentGroup", mappedBy="comment")
     * @ORM\OneToMany(targetEntity="CommentLike", mappedBy="comment")
     */
    private $commenttogroup;

    /**
     * @ORM\OneToMany(targetEntity="CommentGroup", mappedBy="commenttype")
     */
    private $commenttogrouptyepe;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentType(): ?int
    {
        return $this->comment_type;
    }

    public function setCommentType(int $comment_type): self
    {
        $this->comment_type = $comment_type;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

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
