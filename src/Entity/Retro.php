<?php

namespace App\Entity;

use App\Repository\RetroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RetroRepository::class)
 */
class Retro
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
    private $retroLink;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $retroName;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $teamName;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="retro")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=CommentGroup::class, mappedBy="retro")
     */
    private $commentGroups;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->commentGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRetroLink(): ?string
    {
        return $this->retroLink;
    }

    public function setRetroLink(string $retroLink): self
    {
        $this->retroLink = $retroLink;

        return $this;
    }

    public function getRetroName(): ?string
    {
        return $this->retroName;
    }

    public function setRetroName(string $retroName): self
    {
        $this->retroName = $retroName;

        return $this;
    }

    public function getTeamName(): ?string
    {
        return $this->teamName;
    }

    public function setTeamName(string $teamName): self
    {
        $this->teamName = $teamName;

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
            $comment->setRetro($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getRetro() === $this) {
                $comment->setRetro(null);
            }
        }

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
            $commentGroup->setRetro($this);
        }

        return $this;
    }

    public function removeCommentGroup(CommentGroup $commentGroup): self
    {
        if ($this->commentGroups->removeElement($commentGroup)) {
            // set the owning side to null (unless already changed)
            if ($commentGroup->getRetro() === $this) {
                $commentGroup->setRetro(null);
            }
        }

        return $this;
    }
}
