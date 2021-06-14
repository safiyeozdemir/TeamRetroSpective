<?php

namespace App\Entity;

use App\Repository\CommentGroupRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentGroupRepository::class)
 */
class CommentGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $groupName;

    /**
     * @ORM\ManyToOne(targetEntity=Retro::class, inversedBy="commentGroups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $retro;

    /**
     * @ORM\ManyToOne(targetEntity=Comment::class, inversedBy="commentGroups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commnetGroup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    public function setGroupName(string $groupName): self
    {
        $this->groupName = $groupName;

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

    public function getCommnetGroup(): ?Comment
    {
        return $this->commnetGroup;
    }

    public function setCommnetGroup(?Comment $commnetGroup): self
    {
        $this->commnetGroup = $commnetGroup;

        return $this;
    }
}
