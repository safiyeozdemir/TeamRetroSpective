<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=255)
     */
    private $commentText;

    /**
     * @ORM\Column(type="integer")
     */
    private $commentType;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentUser;

    /**
     * @ORM\ManyToOne(targetEntity=Retro::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $retro;

    /**
     * @ORM\OneToMany(targetEntity=CommentGroup::class, mappedBy="commnetGroup")
     */
    private $commentGroups;

    public function __construct()
    {
        $this->commentGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentText(): ?string
    {
        return $this->commentText;
    }

    public function setCommentText(string $commentText): self
    {
        $this->commentText = $commentText;

        return $this;
    }

    public function getCommentType(): ?string
    {
        return $this->commentType;
    }

    public function setCommentType(string $commentType): self
    {
        $this->commentType = $commentType;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCommentUser(): ?User
    {
        return $this->commentUser;
    }

    public function setCommentUser(?User $commentUser): self
    {
        $this->commentUser = $commentUser;

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

    /**
     * @return Collection|CommentGroup[]
     */
    public function getCommentGroups(): Collection
    {
        return $this->commentGroups;
    }

    public function addCommentGroup(CommentGroup $commentGroup): self
    {
        if (!$this->commentGroups->contains($commentGroup)) {
            $this->commentGroups[] = $commentGroup;
            $commentGroup->setCommnetGroup($this);
        }

        return $this;
    }

    public function removeCommentGroup(CommentGroup $commentGroup): self
    {
        if ($this->commentGroups->removeElement($commentGroup)) {
            // set the owning side to null (unless already changed)
            if ($commentGroup->getCommnetGroup() === $this) {
                $commentGroup->setCommnetGroup(null);
            }
        }

        return $this;
    }
}
