<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
    private $userName;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="commentUser")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=CommentLike::class, mappedBy="likeUser")
     */
    private $commentLikes;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->commentLikes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setCommentUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getCommentUser() === $this) {
                $comment->setCommentUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CommentLike[]
     */
    public function getCommentLikes(): Collection
    {
        return $this->commentLikes;
    }

    public function addCommentLike(CommentLike $commentLike): self
    {
        if (!$this->commentLikes->contains($commentLike)) {
            $this->commentLikes[] = $commentLike;
            $commentLike->setLikeUser($this);
        }

        return $this;
    }

    public function removeCommentLike(CommentLike $commentLike): self
    {
        if ($this->commentLikes->removeElement($commentLike)) {
            // set the owning side to null (unless already changed)
            if ($commentLike->getLikeUser() === $this) {
                $commentLike->setLikeUser(null);
            }
        }

        return $this;
    }
}
